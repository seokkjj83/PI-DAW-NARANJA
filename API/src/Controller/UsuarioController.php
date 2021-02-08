<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/usuario", name="usuario", methods={"POST"})
 */
class UsuarioController extends AbstractController
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @Route("/addUsuario", name="addUsuario", methods={"POST"})
     */
    public function addUsuario(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $name = $data['name'];
        $password = $data['password'];

        if (empty($name) || empty($password)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->usuarioRepository->saveUsuario($name, $password);

        return new JsonResponse(['status' => 'Usuario Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getUsuario/{id}", name="getUsuario", methods={"GET"})
     */
    public function getUsuario($id): JsonResponse
    {
        $usuario = $this->usuarioRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $usuario->getId(),
            'name' => $usuario->getName(),
            'password' => $usuario->getPassword(),
            'date' => $usuario->getDate()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getUsuarios", name="getUsuarios", methods={"GET"})
     */
    public function getUsuarios(): JsonResponse
    {
        $usuarios = $this->usuarioRepository->findAll();

        $data = [];

        foreach ($usuarios as $p) {
            $data[] = [
                'id' => $p->getId(),
                'name' => $p->getName(),
                'password' => $p->getPassword(),
                'date' => $p->getDate()
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getUsuariosPorFecha/{fecha}", name="getUsuariosPorFecha", methods={"GET"})
     */
    public function getUsuariosPorDia($fecha): JsonResponse
    {
        $data = $this->usuarioRepository->getUsuariosPorDia($fecha);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateUsuario/{id}", name="updateUsuario", methods={"PUT"})
     */
    public function editUsuario(Request $request, $id): JsonResponse
    {
        $usuario = $this->usuarioRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['name']) ? true : $usuario->setName($data['name']);
        empty($data['password']) ? true : $usuario->setPassword($data['password']);

        $updatedUsuario = $this->usuarioRepository->updateUsuario($usuario);

        return new JsonResponse(['status' => 'Usuario updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteUsuario/{id}", name="deleteUsuario", methods={"DELETE"})
     */
    public function deleteUsuario($id): JsonResponse
    {
        $usuario = $this->usuarioRepository->findOneBy(['id' => $id]);

        $this->usuarioRepository->removeUsuario($usuario);

        return new JsonResponse(['status' => 'proyecto deleted!'], Response::HTTP_OK);
    }
}
     