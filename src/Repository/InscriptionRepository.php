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

    // retourne le nombre d'inscrit à une sortie ($id = l'id de la sortie)
    public function nbInscriptions($id)
    {
        $queryBuilder = $this->createQueryBuilder('m');
        $queryBuilder->select($queryBuilder->expr()->count('m'))->where('m.sortie = :id')->setParameter('id', $id);
        $nombreInscrit = $queryBuilder->getQuery()->getSingleScalarResult();
        return $nombreInscrit;
    }

    // Fonction qui retourne un boolean si l'utilisateur est inscrit à la sortie
    // en argument : id de l'utilisateur et id de la sortie
    // ScalarResult permet de retourner un seul résultat
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

    /*
    public function findOneBySomeField($value): ?Inscription
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
