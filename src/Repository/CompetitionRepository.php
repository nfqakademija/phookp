<?php

namespace App\Repository;

use App\Entity\Competition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use DoctrineExtensions\Query\Mysql\Date;
use Symfony\Bridge\Doctrine\RegistryInterface;


class CompetitionRepository extends ServiceEntityRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * CompetitionRepository constructor.
     * @param RegistryInterface $registry
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Competition::class);
        $this->entityManager = $entityManager;
    }

    /**
     * @param Competition $competition
     */
    public function save(Competition $competition): void
    {
        $this->entityManager->persist($competition);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }

    /**
     * @param string $status
     * @param string $orderBy
     * @return array|null
     */
    public function findCompetitions(string $status, string $orderBy): ?array
    {
        $approved = true;
        return $competitions = $this->createQueryBuilder('r')
            ->where('r.competitionStatus = :competitionStatus')
            ->andWhere('r.competitionApproved = :competitionApproved')
            ->orderBy('r.competitionDate', $orderBy)
            ->setParameter('competitionStatus', $status)
            ->setParameter('competitionApproved', $approved)
            ->getQuery()
            ->getResult();
    }

    public function getExpiredCompetitionsYears(){

        return $years = $this->createQueryBuilder('r')
            ->select('YEAR(r.competitionDate)')
            ->distinct()
            ->orderBy('r.competitionDate', "DESC")
            ->where('r.competitionStatus = :competitionStatus')
            ->andWhere('r.competitionApproved = :competitionApproved')
            ->setParameter('competitionStatus', Competition::STATUS_FINISHED)
            ->setParameter('competitionApproved', true)
            ->getQuery()
            ->getScalarResult();
    }

    public function getExpiredCompetitionByYears(string $years)
    {
        $startDate=new \DateTime($years.'-01-01');
        $endDate=new \DateTime($years.'-12-31');
        return $competitions = $this->createQueryBuilder('r')
            ->where('r.competitionStatus = :competitionStatus')
            ->andWhere('r.competitionApproved = :competitionApproved')
            ->andWhere('r.competitionDate BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->setParameter('competitionStatus', Competition::STATUS_FINISHED)
            ->setParameter('competitionApproved', true)
            ->getQuery()
            ->getResult();
    }

}
