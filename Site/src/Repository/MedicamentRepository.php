<?php

namespace App\Repository;

use APP\Entity\Medicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Medicament|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicament|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicament[]    findAll()
 * @method Medicament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class MedicamentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gerer::class);
    }

    public function findByIdComposer($idComposer) {
        return $this->createQueryBuilder('c')
            ->select('c.id')
            ->where('c.id LIKE :id')
            ->setParameter('composer.id', $idComposer)
            ->getQuery()
            ->getResult();
    }

}