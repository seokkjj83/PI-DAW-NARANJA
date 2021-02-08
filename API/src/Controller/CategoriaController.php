<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
/**
* @Route("/categoria", name="categoria", methods={"POST"})
*/
class CategoriaController extends AbstractController
{
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    /**
     * @Route("/addCategoria", name="addCategoria", methods={"POST"})
     */
    public function addCategoria(Request $request): JsonResponse
    {
        $data = json_encode($request->getContent(), true);

        $nombre = $data['nombre'];

        if (empty($nombre)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->categoriaRepository->saveCategoria($nombre);

        return new JsonResponse(['status' => 'Categoria Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getCategoria/{id}", name="getCategoria", methods={"GET"})
     */
    public function getCategoria($id): JsonResponse
    {
        $categoria = $this->categoriaRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $categoria->getId(),
            'nombre' => $categoria->getNombre(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getCategorias", name="getCategorias", methods={"GET"})
     */
    public function getCategorias(): JsonResponse
    {
        $categorias = $this->categoriaRepository->findAll();

        $data = [];

        foreach ($categorias as $categ) {
            $data[] = [
                'id' => $categ->getId(),
                'nombre' => $categ->getNombre(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateCategoria/{id}", name="updateCategoria", methods={"PUT"})
     */
    public function editCategoria(Request $request, $id): JsonResponse
    {
        $categoria = $this->categoriaRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['nombre']) ? true : $categoria->setNombre($data['nombre']);

        $updatedCategoria = $this->categoriaRepository->updateCategoria($categoria);

        return new JsonResponse(['status' => 'Categoria updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteCategoria/{id}", name="deleteCategoria", methods={"DELETE"})
     */
    public function deleteCategoria($id): JsonResponse
    {
        $categoria = $this->categoriaRepository->findOneBy(['id' => $id]);

        $this->categoriaRepository->removeCategoria($categoria);

        return new JsonResponse(['status' => 'Categoria deleted!'], Response::HTTP_OK);
    }
}
