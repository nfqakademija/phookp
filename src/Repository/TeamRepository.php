<?php
namespace App\Repository;
use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
    public function countRows(int $competitionId) :?int
    {
        return $this->count(['competition'=>$competitionId]);
    }

    public function findById(int $id) : Team
    {
        return $this->findOneBy(["idTeam" => $id]);
    }

    public function removeTeam(Team $team)
    {
        $this->entityManager->remove($team);
    }

}
