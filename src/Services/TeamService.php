<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.18
 * Time: 00.04
 */

namespace App\Services;

use App\Entity\Competition;
use App\Entity\Team;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\TeamRepository;
use Psr\Log\LoggerInterface;

class TeamService
{
    /**
     * @var TeamRepository
     */
    private $teamRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * TeamService constructor.
     * @param TeamRepository $teamRepository
     * @param LoggerInterface $logger
     */
    public function __construct(TeamRepository $teamRepository, LoggerInterface $logger, ValidatorInterface $validator)
    {
        $this->teamRepository = $teamRepository;
        $this->validator = $validator;
        $this->logger = $logger;
        $this->logger->notice(" ");
    }

    public function addTeams(array $teams, Competition $competition)
    {
        foreach ($teams as $team) {
            $team->setCompetition($competition);
            $this->create($team);
        }
    }

    /**
     * @param Team $team
     * @return Team|null
     */
    public function create(Team $team): ?Team
    {
        $this->teamRepository->save($team);
        $this->teamRepository->flush();
        return $team;
    }

    public function find(int $id): ?Team
    {
        return $this->teamRepository->find($id);
    }

}

