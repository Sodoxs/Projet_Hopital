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
    /**
     * @return array
     */
    public function findAll()
    {
        $query = $this->_em->createQueryBuilder('t');
        $query
            ->select('t.id','t.datetraitement','p.nom','l.chambre')
            ->leftJoin('t.idpatient','p')
            ->leftJoin('p.idlit','l')

           ->addOrderBy('t.datetraitement','DESC')
           ->setMaxResults(5);

       return $query->getResult();
    }

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gerer::class);
    }
}