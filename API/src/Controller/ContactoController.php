<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Repository\ContactoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/contacto", name="contacto", methods={"POST"})
 */
class ContactoController extends AbstractController
{
    private $contactoRepository;

    public function __construct(ContactoRepository $contactoRepository)
    {
        $this->contactoRepository = $contactoRepository;
    }

    /**
     * @Route("/addContacto", name="addContacto", methods={"POST"})
     */
    public function addContacto(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $nombre = $data['nombre'];
        $email = $data['email'];
        $mensaje = $data['mensaje'];

        if (empty($nombre) || empty($email) || empty($mensaje)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->contactoRepository->saveContacto($nombre, $email, $mensaje);

        return new JsonResponse(['status' => 'Contacto Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getContacto/{id}", name="getContacto", methods={"GET"})
     */
    public function getContacto($id): JsonResponse
    {
        $contacto = $this->contactoRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $contacto->getId(),
            'nombre' => $contacto->getNombre(),
            'email' => $contacto->getEmail(),
            'mensaje' => $contacto->getMensaje(),
            'fecha' => $contacto->getFecha(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getContactos", name="getContactos", methods={"GET"})
     */
    public function getContactos(): JsonResponse
    {
        $contactos = $this->contactoRepository->findAll();

        $data = [];

        foreach ($contactos as $c) {
            $data[] = [
                'id' => $c->getId(),
                'nombre' => $c->getNombre(),
                'email' => $c->getEmail(),
                'mensaje' => $c->getMensaje(),
                'fecha' => $c->getFecha(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getContactosEntreDosFechas/{fecha1}/{fecha2}", name="getContactosEntreDosFechas", methods={"GET"})
     */
    public function getContactosEntreDosFechas($fecha1, $fecha2)
    {
        $data = $this->contactoRepository->getContactoEntreFechas($fecha1, $fecha2);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateContacto/{id}", name="updateContacto", methods={"PUT"})
     */
    public function editContacto(Request $request, $id): JsonResponse
    {
        $contacto = $this->contactoRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['nombre']) ? true : $contacto->setNombre($data['nombre']);
        empty($data['email']) ? true : $contacto->setEmail($data['email']);
        empty($data['mensaje']) ? true : $contacto->setMensaje($data['mesnaje']);
        empty($data['fecha']) ? true : $contacto->setFecha($data['fecha']);

        $updatedContacto = $this->ContactoRepository->updateContacto($contacto);

        return new JsonResponse(['status' => 'Contacto updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteContacto/{id}", name="deleteContacto", methods={"DELETE"})
     */
    public function deleteContacto($id): JsonResponse
    {
        $contacto = $this->contactoRepository->findOneBy(['id' => $id]);

        $this->contactoRepository->removeCategoria($contacto);

        return new JsonResponse(['status' => 'contacto deleted!'], Response::HTTP_OK);
    }
}
