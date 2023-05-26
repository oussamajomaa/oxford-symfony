<?php

namespace App\Repository;

use App\Entity\Main\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function save(Book $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Book $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return Book[] Returns an array of Book objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Book
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    // public function findByTitleOrder($value, $order)
    // {
    //     return $this->createQueryBuilder('a')
    //         ->where('a.title like :value or a.source like :value or a.notes like :value')
    //         ->setParameter('value', '%' . $value . '%')
    //         ->orderBy('a.title', $order)
    //         ->getQuery()->getResult();
    // }

    // public function findBySourceOrder($value, $order)
    // {
    //     return $this->createQueryBuilder('a')
    //         ->where('a.title like :value or a.source like :value or a.notes like :value')
    //         ->setParameter('value', '%' . $value . '%')
    //         ->orderBy('a.source', $order)
    //         ->getQuery()->getResult();
    // }

    // public function findByNoteseOrder($value, $order)
    // {
    //     return $this->createQueryBuilder('a')
    //         ->where('a.title like :value or a.source like :value or a.notes like :value')
    //         ->setParameter('value', '%' . $value . '%')
    //         ->orderBy("a.notes", $order)
    //         ->getQuery()->getResult();
    // }

    // public function findByClassification($value=null)
    // {
    //     return $this->createQueryBuilder('b')
    //         ->join('b.classification', 'c')
    //         // ->where('s.name = :superCategoryName')
    //         // ->join('c.books','bc')
    //         // ->where('b.id :bc.book_id and c.id:bc.classification_id')
    //         // ->where('c.description :value')
    //         // ->setParameter('value', $value)
    //         ->getQuery()->getResult();
    // }

    public function findByTitleOrder($title)
    {
        return $this->createQueryBuilder('a')
            ->where('a.title like :title')
            ->setParameter('title', '%' . $title . '%')
            // ->orderBy('a.title', $order)
            ->getQuery()->getResult();
    }

    public function advancedSearch($media, $status, $source)
    {
        return $this->createQueryBuilder('a')
            ->where('a.typeDocument = :media and a.status = :status and a.source = :source')
            ->setParameter('media', $media)
            ->setParameter('status', $status)
            ->setParameter('source', $source)
            // ->orderBy('a.title', $order)
            ->getQuery()->getResult();
    }

    public function countClassification(){
        {
            $qb = $this->createQueryBuilder('b')
                ->select('COUNT(b), bc.description')
                ->from('book','b')
                ->innerJoin('b','book_classifications', 'bc', 'b.id = bc.book_id')
                // ->innerJoin('c','classification', 'c.id = bc.calssification_id')
                // ->groupBy('bc.classification_id')
                ->orderBy('num');
    
            return $qb->getQuery()->getResult();
        }
    }



}
