<?php

namespace App\Repository;

use App\Entity\StoreReturns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreReturns|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreReturns|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreReturns[]    findAll()
 * @method StoreReturns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreReturnsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreReturns::class);
    }

     /**
     * @return StoreReturns[] Returns an array of StoreReturns objects
      */

    public function findByCustomerSk($value)
    {
        return $this->createQueryBuilder('sr')
            ->andWhere('sr.srCustomerSk = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }


    /*
    public function findOneBySomeField($value): ?StoreReturns
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
