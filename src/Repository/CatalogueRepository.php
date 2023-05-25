<?php

namespace App\Repository;

use App\Entity\Customer\Catalogue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Catalogue>
 *
 * @method Catalogue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Catalogue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Catalogue[]    findAll()
 * @method Catalogue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalogueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Catalogue::class);
    }

    public function save(Catalogue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Catalogue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return Catalogue[] Returns an array of Catalogue objects
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

    //    public function findOneBySomeField($value): ?Catalogue
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findByTitle($title)
    {
        return $this->createQueryBuilder('a')
            ->where('a.title like :title')
            ->setParameter('title', '%' . $title . '%')
            // ->orderBy('a.title', $order)
            ->getQuery()->getResult();
    }

    public function findByOrderTitle($value,$order)
    {
        return $this->createQueryBuilder('c')
            ->where('c.title like :value or c.identifier like :value')
            ->setParameter('value', '%' . $value . '%')
            ->orderBy('c.title', $order)
            ->getQuery()->getResult();
    }

    public function findByOrderIdentifier($value,$order)
    {
        return $this->createQueryBuilder('c')
            ->where('c.title like :value or c.identifier like :value')
            ->setParameter('value', '%' . $value . '%')
            ->orderBy('c.identifier', $order)
            ->getQuery()->getResult();
    }
}
