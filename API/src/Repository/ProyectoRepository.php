<?php

namespace App\Repository;

use App\Entity\Proyecto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Proyecto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proyecto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proyecto[]    findAll()
 * @method Proyecto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProyectoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Proyecto::class);
        $this->manager = $manager;
    }

    public function saveProyecto($nombre, $descripcion, $imagen, $tiempoEstimado)
    {
        $nuevoProyecto = new Proyecto();

        $nuevoProyecto->setNombre($nombre);
        $nuevoProyecto->setDescripcion($descripcion);
        $nuevoProyecto->setImagen($imagen);
        $nuevoProyecto->setTiempoEstimado($tiempoEstimado);

        $this->manager->persist($nuevoProyecto);
        $this->manager->flush();
    }

    public function updateProyecto(Proyecto $proyecto): Proyecto
    {
        $this->manager->persist($proyecto);
        $this->manager->flush();

        return $proyecto;
    }

    public function removeProyecto(Proyecto $proyecto)
    {
        $this->manager->remove($proyecto);
        $this->manager->flush();
    }

    public function getProyectosCategoria($id)
    {
        //$em = $this->getDoctrine()->getManager();
        //$em = $this->getRepository('AppBundle:Proyecto');
        $qb = $this->manager->createQueryBuilder();

        $qb->select('p')
            ->from(Proyecto::class, 'p')
            ->where('p.categoria_id = :categ')
            ->setParameter('categ', $id);
        return $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    public function getProyectosConTiempoEstimadoMenor($tiempo)
    {
        $qb = $this->manager->createQueryBuilder();

        $qb->select('p')
            ->from(Proyecto::class, 'p')
            ->where('p.tiempoEstimado < :tiempo')
            ->setParameter('tiempo', $tiempo);
        return $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
}
