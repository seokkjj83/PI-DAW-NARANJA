<?php

namespace App\Repository;

use App\Entity\Contacto;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\OrderBy;

/**
 * @method Contacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacto[]    findAll()
 * @method Contacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Contacto::class);
        $this->manager = $manager;
    }

    public function saveContacto($nombre, $email, $mensaje)
    {
        $nuevoContacto = new Contacto();

        $nuevoContacto->setNombre($nombre);
        $nuevoContacto->setEmail($email);
        $nuevoContacto->setMensaje($mensaje);
        $nuevoContacto->setFecha(date('Y-m-d', time()));

        $this->manager->persist($nuevoContacto);
        $this->manager->flush();

    }

    public function updateContacto(Contacto $contacto): Contacto
    {
        $this->manager->persist($contacto);
        $this->manager->flush();

        return $contacto;
    }

    public function removeContacto(Contacto $contacto)
    {
        $this->manager->remove($contacto);
        $this->manager->flush();
    }

    public function getContactoEntreFechas($fecha1, $fecha2)
    {
        $qb = $this->manager->createQueryBuilder();

        $qb->select('c')
            ->from(Contacto::class, 'c')
            ->where('c.fecha BETWEEN :f1 AND :f2')
            ->OrderBy('c.fecha', 'DESC')
            ->setParameter('f1', $fecha1)
            ->setParameter('f2', $fecha2);
        return $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
}
