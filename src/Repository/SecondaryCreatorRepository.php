<?php

namespace App\Repository;

use App\Entity\Customer\SecondaryCreator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecondaryCreator>
 *
 * @method SecondaryCreator|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecondaryCreator|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecondaryCreator[]    findAll()
 * @method SecondaryCreator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecondaryCreatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecondaryCreator::class);
    }

    public function save(SecondaryCreator $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SecondaryCreator $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SecondaryCreator[] Returns an array of SecondaryCreator objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SecondaryCreator
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
