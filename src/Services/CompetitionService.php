<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.2
 * Time: 02.52
 */

namespace App\Services;

use App\Entity\Competition;
use App\Repository\CompetitionRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class CompetitionService
{

    /**
     * @var CompetitionRepository
     */
    private $competitionRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var HashService
     */

    private $hashService;

    /**
     * CompetitionService constructor.
     * @param CompetitionRepository $competitionRepository
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     * @param HashService $hashService
     */
    public function __construct(
        CompetitionRepository $competitionRepository,
        ValidatorInterface $validator,
        LoggerInterface $logger,
        HashService $hashService
    ) {

        $this->competitionRepository = $competitionRepository;
        $this->validator = $validator;
        $this->hashService = $hashService;
        $this->logger = $logger;
    }

    /**
     * @param Competition $competition
     * @return Competition|null
     */
    public function create(Competition $competition): ?Competition
    {
        $this->competitionRepository->save($competition);
        $this->hashService->create($competition);
        $this->competitionRepository->flush();
        return $competition;
    }

    /**
     * @param Competition $competition
     * @return Competition
     */
    public function get(Competition $competition): Competition
    {
        $competition = $this->competitionRepository->find($competition);
        return $competition;
    }

    /**
     * @return array
     */
    public function getFutureCompetitions(): ?array
    {
        $futureCompetitions = $this->competitionRepository->findFutureCompetitions();
        $competitions =$this->getFormattedCompetitions($futureCompetitions);
        return $competitions;
    }

    /**
     * @return array
     */
    public function getGoingCompetitions() :?array
    {
        $goingCompetitions = $this->competitionRepository->findGoingCompetitions();
        $competitions = $this->getFormattedCompetitions($goingCompetitions);
        return $competitions;
    }

    /**
     * @return array|null
     */
    public function getExpiredCompetitions(): ?array
    {
        $expiredCompetitions = $this->competitionRepository->findExpiredCompetitions();
        $competitions = $this->getFormattedCompetitions($expiredCompetitions);
        return $competitions;
    }

    /**
     * @param array $competitions
     * @return array
     */
    private function getFormattedCompetitions(array $competitions): array
    {
        $formattedCompetitions=[];
        foreach ($competitions as $competition) {
            $id = $competition->getId();
            $name = $competition->getCompetitionName();
            $startDate = $competition->getCompetitionDate()->format("Y-m-d");
            $duration = $competition->getCompetitionDuration();
            $finishDate = $this->getFinishDate($startDate, $duration);
            $link=$competition->getCompetitionLink();
            $rules=$competition->getCompetitionRules();
            $competition = ["id" => $id, "name" => $name, "startDate" => $startDate, "finishDate" => $finishDate, "link"=>$link, "rules" =>$rules];
            array_push($formattedCompetitions, $competition);
        }
        return $formattedCompetitions;
    }

    /**
     * @param string $startDate
     * @param string $duration
     * @return string
     */
    public function getFinishDate(string $startDate, string $duration): string
    {
        $addDuration = strtotime($startDate . "+ $duration days");
        return date("Y-m-d", $addDuration);
    }

    /**
     * @param $competition
     * @param $status
     * @return bool
     */
    public function competitionStatus(Competition $competition, string $status): bool
    {
        $competitionStatus = $competition->getCompetitionStatus();
        if ($competitionStatus === $status) {
            return true;
        }
        return false;
    }

    /**
     * @param string $status
     * @param Competition $competition
     */
    public function changeStatus(string $status, Competition $competition)
    {
        $competition->setCompetitionStatus($status);
        $this->competitionRepository->save($competition);
        $this->competitionRepository->flush();
    }
}