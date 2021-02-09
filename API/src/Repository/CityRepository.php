<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findAll()
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, City::class);
        $this->manager = $manager;
    }

    public function saveCity($name, $weather, $size, $nativeLanguage, $continent, $nativeLanguageDificulty, $costOfLiving, $role, $img, $country, $video)
    {
        $nuevoCity = new City();

        $nuevoCity->setName($name);
        $nuevoCity->setWeaher($weather);
        $nuevoCity->setSize($size);
        $nuevoCity->setNativeLanguage($nativeLanguage);
        $nuevoCity->setContinent($continent);
        $nuevoCity->setNativeLanguaeDifficulty($nativeLanguageDificulty);
        $nuevoCity->setCostOfLiving($costOfLiving);
        $nuevoCity->setRole($role);
        $nuevoCity->setImg($img);
        $nuevoCity->setCountry($country);
        $nuevoCity->setVideo($video);

        $this->manager->persist($nuevoCity);
        $this->manager->flush();
    }

    public function updateCity(City $city): City
    {
        $this->manager->persist($city);
        $this->manager->flush();

        return $city;
    }

    public function removeCity(City $city)
    {
        $this->manager->remove($city);
        $this->manager->flush();
    }
    
    /*
    public function getCitiesConTiempoEstimadoMenor($tiempo)
    {
        $qb = $this->manager->createQueryBuilder();

        $qb->select('p')
            ->from(City::class, 'p')
            ->where('p.tiempoEstimado < :tiempo')
            ->setParameter('tiempo', $tiempo);
        return $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
    */

    // /**
    //  * @return City[] Returns an array of City objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?City
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
