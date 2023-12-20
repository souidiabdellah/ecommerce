<?php

namespace App\Repository;

use App\Entity\Caregory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Caregory>
 *
 * @method Caregory|null find($id, $lockMode = null, $lockVersion = null)
 * @method Caregory|null findOneBy(array $criteria, array $orderBy = null)
 * @method Caregory[]    findAll()
 * @method Caregory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaregoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Caregory::class);
    }

//    /**
//     * @return Caregory[] Returns an array of Caregory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Caregory
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
