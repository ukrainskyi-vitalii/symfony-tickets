<?php

namespace App\Repository;

use App\Entity\RouteStation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RouteStation>
 *
 * @method RouteStation|null find($id, $lockMode = null, $lockVersion = null)
 * @method RouteStation|null findOneBy(array $criteria, array $orderBy = null)
 * @method RouteStation[]    findAll()
 * @method RouteStation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RouteStationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RouteStation::class);
    }

//    /**
//     * @return RouteStation[] Returns an array of RouteStation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RouteStation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
