<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Sorties;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sorties|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sorties|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sorties[]    findAll()
 * @method Sorties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sorties::class);
    }


    /**
     * Récupère les sorties en lien avec une recherche
     * @return Sorties[]
     */
   public function findSearch(SearchData $search): array
   {
       $query =$this
           ->createQueryBuilder('s');

       if(empty($search-> motclef)){
           $query = $query
               ->andWhere('s.nom LIKE :nom')
               ->setParameter('nom',"{}");
       }



       if(!empty($search-> motclef)){
           $query = $query
               ->andWhere('s.nom LIKE :nom')
               ->setParameter('nom',"%{$search->motclef}%");
       }

       if(!empty($search-> campus)){
           $query = $query
               ->andWhere('s.campus IN (:campus)')
               ->setParameter('campus',"%{$search->campus}%");
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
}
