<?php
namespace App\Repository;
use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TeamRepository extends ServiceEntityRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * TeamRepository constructor.
     * @param RegistryInterface $registry
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Team::class);
        $this->entityManager = $entityManager;
    }

    /**
     * @param Team $team
     */
    public function save(Team $team): void
    {
        $this->entityManager->persist($team);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }

    /**
     * @param int $competitionId
     * @return int|null
     */
    public function countRows(int $competitionId) :?int
    {
        return $this->count(['competition'=>$competitionId]);
    }

    /**
     * @param int $id
     * @return Team
     */
    public function findById(int $id) : Team
    {
        return $this->findOneBy(["id" => $id]);
    }

    /**
     * @param Team $team
     */
    public function removeTeam(Team $team)
    {
        $this->entityManager->remove($team);
    }

}
