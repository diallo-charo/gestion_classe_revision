<?php

namespace App\Repository;

use App\Dto\EtudiantSearchDto;
use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etudiant>
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    // recuperer tout les etudiants et s'il y'a un critere de filtre il filtre
    public function findAllEtudiantAndFitre(EtudiantSearchDto $searchDto): array{
            $qb = $this->createQueryBuilder('e');
             // Recherche exacte sur le matricule
            if ($searchDto->matricule !== null && $searchDto->matricule !== '') {
                $qb->andWhere('e.matricule = :matricule')
                ->setParameter('matricule', $searchDto->matricule);
            }
            return $qb->getQuery()->getResult();
    }

 

//    /**
//     * @return Etudiant[] Returns an array of Etudiant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Etudiant
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
