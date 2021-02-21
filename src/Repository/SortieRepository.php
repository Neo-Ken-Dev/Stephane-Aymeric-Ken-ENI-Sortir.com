<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

    /**
     * Récupère les sorties en lien avec une recherche
     * @param SearchData $search
     * @return Sortie[]
     */
    public function findSearch(SearchData $search): array
    {
        $query = $this
            ->createQueryBuilder('s')
            ->select('c', 's')
            ->join('s.campus', 'c');


        if (!empty($search->motclef)) {
            $query = $query
                ->andWhere('s.nom LIKE :nom')
                ->setParameter('nom', "%{$search->motclef}%");
        }

        if (!empty($search->campus)) {
            $query = $query
                ->andWhere('c.id IN (:campus)')
                ->setParameter('campus', $search->campus);
        }

        /*  A débloquer quand l'histoire de require sera réglée
         *
         *
         * if(!empty($search-> datedebut)){
            $query =$query
                ->andWhere('s.datedebut IN (:datedebut)' )
                ->setParameter('datedebut', "%{$search->datedebut}%");
        }
         */
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Sortie[] Returns an array of Sortie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    /*
    public function findOneBySomeField($value): ?Sortie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }*/
}
