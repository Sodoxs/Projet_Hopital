<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * Class PatientRepository
 * @package App\Repository
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    public function findByFirstName($prenompatient) {
        return $this->createQueryBuilder('c')
            ->select('c.prenompatient')
            ->where('c.prenompatient LIKE :prenompatient')
            ->setParameter('prenompatient', $prenompatient)
            ->getQuery()
            ->setMaxResults(12)
            ->getResult();
    }
}
