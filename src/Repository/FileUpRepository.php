<?php

namespace App\Repository;

use App\Entity\FileUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FileUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileUp[]    findAll()
 * @method FileUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileUpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileUp::class);
    }

    // /**
    //  * @return FileUp[] Returns an array of FileUp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FileUp
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
