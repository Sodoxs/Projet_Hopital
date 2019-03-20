<?php

namespace App\Repository;

use App\Entity\Lit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lit[]    findAll()
 * @method Lit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class LitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lit::class);
    }
}