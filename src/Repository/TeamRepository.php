<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityManagerInterface;

class TeamRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Team::class);
        $this->entityManager = $entityManager;
    }

    public function save(Team $team): void
    {
        $this->entityManager->persist($team);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }
}
