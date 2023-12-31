<?php

namespace App\Repository;

use App\Entity\Contenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contenu>
 *
 * @method Contenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contenu[]    findAll()
 * @method Contenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contenu::class);
    }

    /**
    * @return Contenu[] Returns an array of Contenu objects
    */
           
    public function findByModuleId(int $id) {
        return $this->createQueryBuilder('contenu')
            ->leftJoin('contenu.module', 'module')
            ->where('module.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            // ->getOneOrNullResult();
            ->getResult();
    }
}
