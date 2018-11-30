<?php

namespace App\Repository;

use App\Entity\Competition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function findByCompetition($competition)
    {
        return $this->findBy($competition);
    }
}
