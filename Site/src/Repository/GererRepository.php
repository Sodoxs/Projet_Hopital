<?php

namespace App\Repository;

use APP\Entity\Gerer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gerer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gerer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gerer[]    findAll()
 * @method Gerer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class GererRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, Gerer::class);
    }
}