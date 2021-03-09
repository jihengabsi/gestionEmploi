<?php

namespace App\Repository;

use App\Entity\CareerAdvice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CareerAdvice|null find($id, $lockMode = null, $lockVersion = null)
 * @method CareerAdvice|null findOneBy(array $criteria, array $orderBy = null)
 * @method CareerAdvice[]    findAll()
 * @method CareerAdvice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CareerAdviceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CareerAdvice::class);
    }

    // /**
    //  * @return CareerAdvice[] Returns an array of CareerAdvice objects
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
    public function findOneBySomeField($value): ?CareerAdvice
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
