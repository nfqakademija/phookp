<?php

namespace App\Repository;

use App\Entity\Result;
use App\Entity\Team;
use App\Entity\Weighing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Result|null find($id, $lockMode = null, $lockVersion = null)
 * @method Result|null findOneBy(array $criteria, array $orderBy = null)
 * @method Result[]    findAll()
 * @method Result[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultRepository extends ServiceEntityRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * ResultRepository constructor.
     * @param RegistryInterface $registry
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, Result::class);
    }

    /**
     * @param Result $result
     */
    public function save(Result $result): void
    {
        $this->entityManager->persist($result);
    }

    public function  flush(): void
    {
        $this->entityManager->flush();
    }

    /**
     * @param int $teamId
     * @param int $weighingId
     * @return Collection
     */
    public function findByTeamAndWeighing(int $teamId, int $weighingId): Collection
    {
       $results = $this->createQueryBuilder('r')
            ->where('r.team = :teamid')
            ->andWhere('r.weighing = :weighingid')
            ->setParameter('teamid', $teamId)
            ->setParameter('weighingid', $weighingId)
            ->getQuery()
            ->getResult();

       return new ArrayCollection($results);
    }

    /**
     * @param Result $result
     */
    public function removeResult(Result $result): void
    {
        $this->entityManager->remove($result);
    }

}
