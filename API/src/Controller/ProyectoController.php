<?php

namespace App\Controller;

use App\Entity\Proyecto;
use App\Repository\ProyectoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/proyecto", name="proyecto", methods={"POST"})
 */
class ProyectoController extends AbstractController
{
    private $proyectoRepository;

    public function __construct(ProyectoRepository $proyectoRepository)
    {
        $this->proyectoRepository = $proyectoRepository;
    }

    /**
     * @Route("/addProyecto", name="addProyecto", methods={"POST"})
     */
    public function addProyecto(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $imagen = $data['imagen'];
        $tiempoEstimado = $data['tiempo_estimado'];

        if (empty($nombre) || empty($descripcion) || empty($imagen) || empty($tiempoEstimado)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->proyectoRepository->saveProyecto($nombre, $descripcion, $imagen, $tiempoEstimado);

        return new JsonResponse(['status' => 'Proyecto Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getProyecto/{id}", name="getProyecto", methods={"GET"})
     */
    public function getProyecto($id): JsonResponse
    {
        $proyecto = $this->proyectoRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $proyecto->getId(),
            'nombre' => $proyecto->getNombre(),
            'descripcion' => $proyecto->getDescripcion(),
            'imagen' => $proyecto->getImagen(),
            'tiempo_estimado' => $proyecto->getTiempoEstimado()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getProyectos", name="getProyectos", methods={"GET"})
     */
    public function getProyectos(): JsonResponse
    {
        $proyectos = $this->proyectoRepository->findAll();

        $data = [];

        foreach ($proyectos as $p) {
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
     * @Route("/getProyectosMenorTiempo/{tiempo}", name="getProyectosMenorTiempo", methods={"GET"})
     */
    public function getProyectosConTiempoEstimadoMenor($tiempo): JsonResponse
    {
        $data = $this->proyectoRepository->getProyectosConTiempoEstimadoMenor($tiempo);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getProyectosConCategoria/{id}", name="getProyectosConCategoria", methods={"GET"})
     */
    public function getProyectosConCategoria($id): JsonResponse
    {
        $data = $this->proyectoRepository->getProyectosCategoria($id);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateProyecto/{id}", name="updateProyecto", methods={"PUT"})
     */
    public function editProyecto(Request $request, $id): JsonResponse
    {
        $proyecto = $this->proyectoRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['nombre']) ? true : $proyecto->setNombre($data['nombre']);
        empty($data['descripcion']) ? true : $proyecto->setDescripcion($data['descripcion']);
        empty($data['imagen']) ? true : $proyecto->setImagen($data['imagen']);
        empty($data['tiempo_estimado']) ? true : $proyecto->setTiempoEstimado($data['tiempo_estimado']);

        $updatedProyecto = $this->proyectoRepository->updateProyecto($proyecto);

        return new JsonResponse(['status' => 'Proyecto updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteProyecto/{id}", name="deleteProyecto", methods={"DELETE"})
     */
    public function deleteProyecto($id): JsonResponse
    {
        $proyecto = $this->proyectoRepository->findOneBy(['id' => $id]);

        $this->proyectoRepository->removeProyecto($proyecto);

        return new JsonResponse(['status' => 'proyecto deleted!'], Response::HTTP_OK);
    }
}
