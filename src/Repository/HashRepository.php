<?php

namespace App\Repository;

use App\Entity\Hash;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class HashRepository extends ServiceEntityRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * HashRepository constructor.
     * @param RegistryInterface $registry
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, Hash::class);
    }

    /**
     * @param $hash
     * @return null|object
     */
    public function findByHash($hash){
        return $this->findOneBy(['hash'=>$hash]);
    }

    /**
     * @param Hash $hash
     */
    public function save(Hash $hash): void
    {
        $this->entityManager->persist($hash);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }

}
