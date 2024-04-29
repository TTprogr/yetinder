<?php

namespace App\Repository;

use App\Entity\Hodnoceni;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hodnoceni>
 *
 * @method Hodnoceni|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hodnoceni|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hodnoceni[]    findAll()
 * @method Hodnoceni[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HodnoceniRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hodnoceni::class);
    }

    //    /**
    //     * @return Hodnoceni[] Returns an array of Hodnoceni objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('h.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Hodnoceni
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
