<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/addUser", name="addUser", methods={"POST"})
     */
    public function addUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $imagen = $data['imagen'];
        $tiempoEstimado = $data['tiempo_estimado'];

        if (empty($nombre) || empty($descripcion) || empty($imagen) || empty($tiempoEstimado)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->userRepository->saveUser($nombre, $descripcion, $imagen, $tiempoEstimado);

        return new JsonResponse(['status' => 'User Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getUser/{id}", name="getUser", methods={"GET"})
     */
    public function getUser($id): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $user->getId(),
            'nombre' => $user->getNombre(),
            'descripcion' => $user->getDescripcion(),
            'imagen' => $user->getImagen(),
            'tiempo_estimado' => $user->getTiempoEstimado()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getUsers", name="getUsers", methods={"GET"})
     */
    public function getUsers(): JsonResponse
    {
        $users = $this->userRepository->findAll();

        $data = [];

        foreach ($users as $p) {
            $data[] = [
                'id' => $p->getId(),
                'nombre' => $p->getNombre(),
                'descripcion' => $p->getDescripcion(),
                'imagen' => $p->getImagen(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getUsersMenorTiempo/{tiempo}", name="getUsersMenorTiempo", methods={"GET"})
     */
    public function getUsersConTiempoEstimadoMenor($tiempo): JsonResponse
    {
        $data = $this->userRepository->getUsersConTiempoEstimadoMenor($tiempo);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getUsersConCategoria/{id}", name="getUsersConCategoria", methods={"GET"})
     */
    public function getUsersConCategoria($id): JsonResponse
    {
        $data = $this->userRepository->getUsersCategoria($id);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateUser/{id}", name="updateUser", methods={"PUT"})
     */
    public function editUser(Request $request, $id): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['nombre']) ? true : $user->setNombre($data['nombre']);
        empty($data['descripcion']) ? true : $user->setDescripcion($data['descripcion']);
        empty($data['imagen']) ? true : $user->setImagen($data['imagen']);
        empty($data['tiempo_estimado']) ? true : $user->setTiempoEstimado($data['tiempo_estimado']);

        $updatedUser = $this->userRepository->updateUser($user);

        return new JsonResponse(['status' => 'User updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteUser/{id}", name="deleteUser", methods={"DELETE"})
     */
    public function deleteUser($id): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        $this->userRepository->removeUser($user);

        return new JsonResponse(['status' => 'user deleted!'], Response::HTTP_OK);
    }
}
