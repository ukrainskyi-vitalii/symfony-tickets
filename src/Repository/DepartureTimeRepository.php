<?php

namespace App\Repository;

use App\Entity\DepartureTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DepartureTime>
 *
 * @method DepartureTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartureTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartureTime[]    findAll()
 * @method DepartureTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartureTimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartureTime::class);
    }

//    /**
//     * @return DepartureTime[] Returns an array of DepartureTime objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DepartureTime
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
