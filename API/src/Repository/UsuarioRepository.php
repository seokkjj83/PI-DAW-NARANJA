<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    public function saveUsuario($name, $password)
    {
        $nuevoUsuario = new User();

        $nuevoUsuario->setName($name);
        $nuevoUsuario->setPassword($password);
        $nuevoUsuario->setDate(date('Y-m-d', time()));

        $this->manager->persist($nuevoUsuario);
        $this->manager->flush();
    }

    public function updateUsuario($usuario): User
    {
        $this->manager->persist($usuario);
        $this->manager->flush();

        return $usuario;
    }

    public function removeUsuario($usuario)
    {
        $this->manager->remove($usuario);
        $this->manager->flush();
    }

    public function getUsuariosPorDia($fecha)
    {
        $qb = $this->manager->createQueryBuilder();

        $qb
            ->select('u')
            ->from(User::class, 'u')
            ->where('u.date = :tiempo')
            ->setParameter('tiempo', $fecha);
        return $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
}
