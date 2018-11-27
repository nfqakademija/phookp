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
    }

    /**
     * @param array $teams
     * @param Competition $competition
     * @return array
     */
    public function addTeams(array $teams, Competition $competition): array
    {
        $addedTeamsQuantity = 0;
        $notAddedName = false;

        foreach ($teams as $team) {
            $teamName = $team->getTeamName();
            $firstTeamMember = $team->getFirstTeamMember();
            $secondTeamMember = $team->getSecondTeamMember();
            $thirdTeamMember = $team->getThirdTeamMember();
            if ($teamName != null && ($firstTeamMember != null || $secondTeamMember != null || $thirdTeamMember != null))
            {
                $team->setCompetition($competition);
                $this->create($team);
                $addedTeamsQuantity++;
            } elseif (
                ($teamName === null && ($firstTeamMember != null || $secondTeamMember != null || $thirdTeamMember != null)) ||
                ($teamName != null && ($firstTeamMember === null && $secondTeamMember === null && $thirdTeamMember != null)))
            {
                $notAddedName = true;
            }
        }
        return array('addedTeamsQuantity' => $addedTeamsQuantity, 'notAddedName' => $notAddedName);
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
        return $this->teamRepository->findOneBy(['id' => $id]);
    }

    /**
     * @param Team $team
     * @return array|null
     */
    public function validate(Team $team): ?array
    {
        $errors = $this->validator->validate($team);
        if (count($errors) > 0) {
            return $errors;
        } else return null;
    }

    /**
     * @param Competition $competition
     * @return int|null
     */
    public function countTeams(Competition $competition) :int
    {
        $competitionId=$competition->getIdCompetition();
        $totalSectors=$competition->getCompetitionSectorCount();
        $completeSectors = $this->teamRepository->countRows($competitionId);

        return $sectors = $totalSectors - $completeSectors;
    }

    /**
     * @param int $id
     */
    public function remove(int $id): void
    {
        $team=$this->teamRepository->findById($id);
        $this->teamRepository->removeTeam($team);
        $this->teamRepository->flush();
    }

}

