<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.16
 * Time: 02.22
 */

namespace App\Services;

use App\Entity\Team;
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
     * TeamService constructor.
     * @param TeamRepository $teamRepository
     * @param LoggerInterface $logger
     */
    public function __construct(TeamRepository $teamRepository, LoggerInterface $logger)
    {

        $this->teamRepository = $teamRepository;
        $this->logger = $logger;
        $this->logger->notice(" ");
    }

    /**
     * @param Team $team
     * @return Team|null
     */
    public function create(Team $team):?Team
    {
        $this->teamRepository->save($team);
        $this->teamRepository->flush();
        return $team;
    }

}