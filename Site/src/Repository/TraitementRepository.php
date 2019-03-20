<?php

namespace App\Repository;

use APP\Entity\Gerer;
use App\Entity\Traitement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Traitement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traitement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traitement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class TraitementRepository extends ServiceEntityRepository
{
    public function findAll()
    {
       $query = $this->_em->createQueryBuilder('t')
           ->select('t.id','t.datetraitement')
           ->where('t.datefintraitement = :my_date')
           ->setParameter('my_date',null)

           ->leftJoin('t.idpatient','p')
           ->addSelect('p.nompatient','p.prenompatient')

           ->leftJoin('p.idlit','l')
           ->addSelect('l.chambre','l.etage','l.aile')

           ->addOrderBy('t.datetraitement','DESC')
           ->setMaxResults(5);

       return $query->getResult();
    }

    public function findByIdpatient($idpatient) {
        return $this->createQueryBuilder('c')
            ->select('c.idpatient')
            ->where('c.idpatient LIKE :idpatient')
            ->setParameter('idpatient', $idpatient)
            ->orderBy('c.datetraitement','ASC')
            ->getQuery()
            ->getResult();
    }

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gerer::class);
    }
}