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

        $role = $data['role'];
        $nickname = $data['nickname'];
        $pass = $data['pass'];
        $email = $data['email'];
        $number = $data['number'];
        $favouriteWeather = $data['favouriteWeather'];
        $mainLanguage = $data['mainLanguage'];
        $english = $data['english'];
        $continent = $data['continent'];
        $country = $data['country'];

        if (
            empty($nombre) || empty($descripcion) || empty($imagen) || empty($tiempoEstimado) || empty($nombre) || empty($descripcion) ||
            empty($imagen) || empty($tiempoEstimado) || empty($nombre) || empty($descripcion)
        ) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->userRepository->saveUser($role, $nickname, $pass, $email, $number, $favouriteWeather, $mainLanguage, $english, $continent, $country);

        return new JsonResponse(['status' => 'User Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getUser/{idUser}", name="getUser", methods={"GET"})
     */
    public function getUsr($idUser): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['idUser' => $idUser]);

        $data = [
            'role' => $user->getRole(),
            'nickname' => $user->getNickname(),
            'pass' => $user->getPass(),
            'email' => $user->getEmail(),
            'number' => $user->getNumber(),
            'favouriteWeather' => $user->getFavouriteWeather(),
            'mainLanguage' => $user->getMainLanguage(),
            'english' => $user->getEnglish(),
            'continent' => $user->getContinent(),
            'country' => $user->getCountry()
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

        foreach ($users as $user) {
            $data[] = [
                'role' => $user->getRole(),
                'nickname' => $user->getNickname(),
                'pass' => $user->getPass(),
                'email' => $user->getEmail(),
                'number' => $user->getNumber(),
                'favouriteWeather' => $user->getFavouriteWeather(),
                'mainLanguage' => $user->getMainLanguage(),
                'english' => $user->getEnglish(),
                'continent' => $user->getContinent(),
                'country' => $user->getCountry()
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateUser/{idUser}", name="updateUser", methods={"PUT"})
     */
    public function editUser(Request $request, $idUser): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['idUser' => $idUser]);
        $data = json_decode($request->getContent(), true);
        empty($data['role']) ? true : $user->setRole($data['role']);
        empty($data['nickname']) ? true : $user->setNickname($data['nickname']);
        empty($data['pass']) ? true : $user->setPass($data['pass']);
        empty($data['email']) ? true : $user->setEmail($data['email']);
        empty($data['number']) ? true : $user->setNumber($data['number']);
        empty($data['favouriteWeather']) ? true : $user->setFavouriteWeather($data['favouriteWeather']);
        empty($data['mainLanguage']) ? true : $user->setMainLanguage($data['mainLanguage']);
        empty($data['english']) ? true : $user->setEnglish($data['english']);
        empty($data['continent']) ? true : $user->setContinent($data['continent']);
        empty($data['country']) ? true : $user->setCountry($data['country']);

        $updatedUser = $this->userRepository->updateUser($user);

        return new JsonResponse(['status' => 'User updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteUser/{idUser}", name="deleteUser", methods={"DELETE"})
     */
    public function deleteUser($idUser): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['idUser' => $idUser]);

        $this->userRepository->removeUser($user);

        return new JsonResponse(['status' => 'user deleted!'], Response::HTTP_OK);
    }
}
