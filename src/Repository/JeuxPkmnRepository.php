<?php

namespace App\Repository;

use App\Entity\JeuxPkmn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JeuxPkmn|null find($id, $lockMode = null, $lockVersion = null)
 * @method JeuxPkmn|null findOneBy(array $criteria, array $orderBy = null)
 * @method JeuxPkmn[]    findAll()
 * @method JeuxPkmn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxPkmnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JeuxPkmn::class);
    }

    // /**
    //  * @return JeuxPkmn[] Returns an array of JeuxPkmn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JeuxPkmn
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
