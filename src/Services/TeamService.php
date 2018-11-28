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
use App\Repository\TeamRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
    }

    /**
     * @param array $teams
     * @param Competition $competition
     * @return array
     */
    public function addTeams(array $teams, Competition $competition): array
    {
        $addedTeamsQuantity = 0;
        $isAddedName = true;

        foreach ($teams as $team) {
            $teamName = $team->getTeamName();
            $firstTeamMember = $team->getFirstTeamMember();
            $secondTeamMember = $team->getSecondTeamMember();
            $thirdTeamMember = $team->getThirdTeamMember();
            if ($teamName != null && ($firstTeamMember != null || $secondTeamMember != null || $thirdTeamMember != null)) {
                $team->setCompetition($competition);
                $this->create($team);
                $addedTeamsQuantity++;
            } elseif (
                ($teamName === null && ($firstTeamMember != null || $secondTeamMember != null || $thirdTeamMember != null)) ||
                ($teamName != null && ($firstTeamMember === null && $secondTeamMember === null && $thirdTeamMember != null))) {
                $isAddedName =false;
            }
        }
        return array('addedTeamsQuantity' => $addedTeamsQuantity, 'isAddedName' => $isAddedName);
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

    /**
     * @param int $id
     * @return Team|null
     */
    public function find(int $id): ?Team
    {
        return $this->teamRepository->findById($id);
    }

    /**
     * @param Competition $competition
     * @return int|null
     */
    public function countTeams(Competition $competition): int
    {
        $competitionId = $competition->getId();
        $totalTeams = $competition->getCompetitionTeamsCount();
        $completeTeams = $this->teamRepository->countRows($competitionId);

        return $sectors = $totalTeams - $completeTeams;
    }

    /**
     * @param int $id
     */
    public function remove(int $id): void
    {
        $team = $this->teamRepository->findById($id);
        $this->teamRepository->removeTeam($team);
        $this->teamRepository->flush();
    }

    /**
     * @param array $teams
     * @return bool
     */
    public function addTeamsSectors(array $teams)
    {
        $isAdded=true;
        foreach ($teams as $team) {
            $sectorNr = $team->getSectorNr();
            if ($sectorNr != null) {
                $team->setSectorNr($sectorNr);
                $this->create($team);
            }
            else{
                $isAdded=false;
            }
        }
        return $isAdded;
    }
}



