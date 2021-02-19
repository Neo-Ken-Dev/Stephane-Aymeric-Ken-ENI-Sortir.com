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
        $query =$this
            ->createQueryBuilder('s')
            ->select ('c','s')
            ->join('s.campus','c');



        if(!empty($search-> motclef)){
            $query = $query
                ->andWhere('s.nom LIKE :nom')
                ->setParameter('nom',"%{$search->motclef}%");
        }

        if(!empty($search-> campus)){
            $query = $query
                ->andWhere('c.id IN (:campus)')
                ->setParameter('campus',$search->campus);
        }

        if(!empty($search-> datedebut)){
            $query =$query

                ->andWhere('s.dateHeureDebut LIKE :date_heure_debut' )
                ->setParameter('date_heure_debut',"%{$search->datedebut}%");
        }

        return $query->getQuery()->getResult();
    }

}
