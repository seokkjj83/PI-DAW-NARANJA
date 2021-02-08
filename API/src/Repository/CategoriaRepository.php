<?php

namespace App\Repository;

use App\Entity\Categoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Categoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categoria[]    findAll()
 * @method Categoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Categoria::class);
        $this->manager = $manager;
    }

    public function saveCategoria($nombre)
    {
        $nuevaCategoria = new Categoria();

        $nuevaCategoria
            ->setNombre($nombre);

        $this->manager->persist($nuevaCategoria);
        $this->manager->flush();
    }

    public function updateCategoria(Categoria $categoria): Categoria
    {
        $this->manager->persist($categoria);
        $this->manager->flush();

        return $categoria;
    }

    public function removeCategoria(Categoria $categoria)
    {
        $this->manager->remove($categoria);
        $this->manager->flush();
    }
}
