<?php

namespace App\Controller;

use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CityController extends AbstractController
{
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @Route("/addCity", name="addCity", methods={"POST"})
     */
    public function addCity(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $name = $data['name'];
        $weather = $data['weather'];
        $size = $data['size'];
        $nativeLanguage = $data['nativeLanguage'];
        $continent = $data['continent'];
        $nativeLanguageDificulty = $data['nativeLanguageDificulty'];
        $costOfLiving = $data['costOfLiving'];
        $role = $data['role'];
        $img = $data['img'];
        $country = $data['country'];
        $video = $data['video'];

        if (empty($name) || empty($weather) || empty($size) || empty($nativeLanguage) || empty($continent) || empty($nativeLanguageDificulty) || empty($costOfLiving) || empty($role) || empty($img) || empty($country) || empty($video)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->cityRepository->saveCity($name, $weather, $size, $nativeLanguage, $continent, $nativeLanguageDificulty, $costOfLiving, $role, $img, $country, $video);

        return new JsonResponse(['status' => 'City Created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getCity/{idCity}", name="getCity", methods={"GET"})
     */
    public function getCity($idCity): JsonResponse
    {
        $city = $this->cityRepository->findOneBy(['idCity' => $idCity]);

        $data = [
            'idCity' => $city->getIdCity(),
            'name' => $city->getName(),
            'weather' => $city->getWeather(),
            'size' => $city->getSize(),
            'nativeLanguage' => $city->getNativeLanguage(),
            'continent' => $city->getContinent(),
            'nativeLanguageDificulty' => $city->getNativeLanguageDificulty(),
            'costOfLiving' => $city->getCostOfLiving(),
            'role' => $city->getRrole(),
            'img' => $city->getImg(),
            'country' => $city->getCountry(),
            'video' => $city->getVideo()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/getCities", name="getCities", methods={"GET"})
     */
    public function getCities(): JsonResponse
    {
        $cities = $this->cityRepository->findAll();

        $data = [];

        foreach ($cities as $city) {
            $data[] = [
                'idCity' => $city->getIdCity(),
                'name' => $city->getName(),
                'weather' => $city->getWeather(),
                'size' => $city->getSize(),
                'nativeLanguage' => $city->getNativeLanguage(),
                'continent' => $city->getContinent(),
                'nativeLanguageDificulty' => $city->getNativeLanguageDificulty(),
                'costOfLiving' => $city->getCostOfLiving(),
                'role' => $city->getRrole(),
                'img' => $city->getImg(),
                'country' => $city->getCountry(),
                'video' => $city->getVideo()
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/updateCity/{idCity}", name="updateCity", methods={"PUT"})
     */
    public function editCity(Request $request, $idCity): JsonResponse
    {
        $city = $this->cityRepository->findOneBy(['idCity' => $idCity]);
        $data = json_decode($request->getContent(), true);

        empty($data['name']) ? true : $city->setName($data['name']);
        empty($data['weather']) ? true : $city->setWeather($data['weather']);
        empty($data['size']) ? true : $city->setSize($data['size']);
        empty($data['nativeLanguage']) ? true : $city->setNativeLanguage($data['nativeLanguage']);
        empty($data['continent']) ? true : $city->setContinent($data['continent']);
        empty($data['nativeLanguageDificulty']) ? true : $city->setNativeLanguageDificulty($data['nativeLanguageDificulty']);
        empty($data['costOfLiving']) ? true : $city->setCostOfLiving($data['costOfLiving']);
        empty($data['role']) ? true : $city->setRole($data['role']);
        empty($data['img']) ? true : $city->setImg($data['img']);
        empty($data['country']) ? true : $city->setCountry($data['country']);
        empty($data['video']) ? true : $city->setVideo($data['video']);

        $updatedCity = $this->cityRepository->updateCity($city);

        return new JsonResponse(['status' => 'City updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/deleteCity/{idCity}", name="deleteCity", methods={"DELETE"})
     */
    public function deleteCity($idCity): JsonResponse
    {
        $city = $this->cityRepository->findOneBy(['idCity' => $idCity]);

        $this->cityRepository->removeCity($city);

        return new JsonResponse(['status' => 'city deleted!'], Response::HTTP_OK);
    }
}
