<?php

namespace App\Repository;

use App\Entity\CallCenter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CallCenter|null find($id, $lockMode = null, $lockVersion = null)
 * @method CallCenter|null findOneBy(array $criteria, array $orderBy = null)
 * @method CallCenter[]    findAll()
 * @method CallCenter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CallCenterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CallCenter::class);
    }

    // /**
    //  * @return CallCenter[] Returns an array of CallCenter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CallCenter
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
