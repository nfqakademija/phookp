<?php

namespace App\Repository;

use App\Entity\Competition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class EventRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Competition::class);
        $this->entityManager = $entityManager;
    }


    public function findByHash(string $hash): Competition
    {
        // TODO: Implement findByHash() method.
    }

    public function save(Competition $event): void
    {
        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
