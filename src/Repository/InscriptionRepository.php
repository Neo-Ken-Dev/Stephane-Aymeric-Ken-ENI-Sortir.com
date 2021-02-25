<?php

namespace App\Repository;

use App\Entity\Inscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Inscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscription[]    findAll()
 * @method Inscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscription::class);
    }

    // CONNAITRE LE NB D INSCRIT A LA SORTIE
    public function nbInscriptions($id)
    {
        $queryBuilder = $this->createQueryBuilder('m');
        $queryBuilder->select($queryBuilder->expr()->count('m'))->where('m.sortie = :id')->setParameter('id', $id);
        $nombreInscrit = $queryBuilder->getQuery()->getSingleScalarResult();
        return $nombreInscrit;
    }

    //CONNAITRE SI USER INSCRIT OU NON (BOOLEEN), ON VERIFIE SI D'ID DU USER EST ASSOCIES A LA SORTIE EN COURS
    public function rechercheInscription($idUser, $idSortie)
    {
        $queryBuilder = $this->createQueryBuilder('m');
        return $queryBuilder->select($queryBuilder->expr()->count('m'))->where('m.user = :idUser')->andWhere('m.sortie = :idSortie')
                ->setParameter('idUser', $idUser)->setParameter('idSortie', $idSortie)->getQuery()->getSingleScalarResult() > 0;
    }

    // /**
    //  * @return Inscription[] Returns an array of Inscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    // RETOURNE LES INSCRITS A LA SORTIE.
    public function listDesInscrits($id)
    {
        $queryBuilder = $this->createQueryBuilder('i');
        $queryBuilder->where('i.sortie = :id')->setParameter('id', $id);
        $query = $queryBuilder->getQuery();
        return $query->getResult();
    }
}
