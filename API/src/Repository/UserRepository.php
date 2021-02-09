<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    public function saveUser($role, $nickname, $pass, $email, $number, $favouriteWeather, $mainLanguage, $english, $continent, $country)
    {
        $nuevoUser = new User();

        $nuevoUser->setRole($role);
        $nuevoUser->setNickname($nickname);
        $nuevoUser->setPass($pass);
        $nuevoUser->setEmail($email);
        $nuevoUser->setNumber($number);
        $nuevoUser->setFavouriteWeather($favouriteWeather);
        $nuevoUser->setMainLanguage($mainLanguage);
        $nuevoUser->setEnglish($english);
        $nuevoUser->setContinent($continent);
        $nuevoUser->setCountry($country);

        $this->manager->persist($nuevoUser);
        $this->manager->flush();
    }

    public function updateUser(User $user): User
    {
        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }

    public function removeUser(User $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }

    /*
    public function getUsersConTiempoEstimadoMenor($tiempo)
    {
        $qb = $this->manager->createQueryBuilder();

        $qb->select('p')
            ->from(User::class, 'p')
            ->where('p.tiempoEstimado < :tiempo')
            ->setParameter('tiempo', $tiempo);
        return $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
    */

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
