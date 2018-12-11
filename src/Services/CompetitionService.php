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
use Symfony\Component\Translation\TranslatorInterface;

final class CompetitionService
{

    /**
     * @var CompetitionRepository
     */
    private $competitionRepository;
    /**
     * @var HashService
     */

    private $hashService;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * CompetitionService constructor.
     * @param CompetitionRepository $competitionRepository
     * @param HashService $hashService
     * @param TranslatorInterface $translator
     */
    public function __construct(
        CompetitionRepository $competitionRepository,
        HashService $hashService,
        TranslatorInterface $translator
    ) {

        $this->competitionRepository = $competitionRepository;
        $this->hashService = $hashService;
        $this->translator = $translator;
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
        $futureCompetitions = $this->competitionRepository->findCompetitions(Competition::STATUS_CONFIRMED, "ASC");
        return $this->getFormattedCompetitions($futureCompetitions);
    }

    /**
     * @return array
     */
    public function getGoingCompetitions(): ?array
    {
        $goingCompetitions = $this->competitionRepository->findCompetitions(Competition::STATUS_STARTED, "ASC");
        return $this->getFormattedCompetitions($goingCompetitions);
    }

    /**
     * @return array|null
     */
    public function getExpiredCompetitions(): ?array
    {
        $expiredCompetitions = $this->competitionRepository->findCompetitions(Competition::STATUS_FINISHED, "DESC");
        return $this->getFormattedCompetitions($expiredCompetitions);
    }

    /**
     * @param array $competitions
     * @return array
     */
    private function getFormattedCompetitions(array $competitions): array
    {
        $formattedCompetitions = [];
        foreach ($competitions as $competition) {
            $id = $competition->getId();
            $name = $competition->getCompetitionName();
            $startDate = $this->getStartDate($competition->getCompetitionDate());
            $duration = $competition->getCompetitionDuration();
            $finishDate = $this->getFinishDate($competition->getCompetitionDate(), $duration);
            $link = $competition->getCompetitionLink();
            $rules = $competition->getCompetitionRules();
            $location = $competition->getCompetitionLocation();
            $competition = [
                "id" => $id,
                "name" => $name,
                "year" => $startDate["year"],
                "month" => $startDate["month"],
                "days" => $startDate["day"] . "-" . $finishDate,
                "link" => $link,
                "rules" => $rules,
                "location" => $location
            ];
            array_push($formattedCompetitions, $competition);
        }
        return $formattedCompetitions;
    }


    /**
     * @return array
     */
    public function getExpiredCompetitionsYears(): ?array
    {
        return $expiredCompetitionsYears = $this->competitionRepository->getExpiredCompetitionsYears();
    }

    public function getExpiredCompetitionsByYears(string $years)
    {
        $startDate=new \DateTime($years."-01-01");
        $endDate= new \DateTime($years."-12-31");
        $expiredCompetitionsByYears = $this->competitionRepository->getExpiredCompetitionByYears($startDate, $endDate);
        return $this->getFormattedCompetitions($expiredCompetitionsByYears);
    }



    /**
     * @param \DateTime $startDate
     * @param string $duration
     * @return string
     */
    private function getFinishDate(\DateTime $startDate, string $duration): string
    {
        $addDuration = strtotime($startDate->format("Y-m-d") . "+ $duration days");
        return date("j", $addDuration);

    }

    /**
     * @param \DateTime $startDate
     * @return string
     */
    private function getStartDate(\DateTime $startDate): array
    {
        $date = explode(" ", $startDate->format("Y n j"));
        $year = $date[0];
        $month = $this->translator->trans($date[1]);
        $day = $date[2];
        return ["year" => $year, "month" => $month, "day" => $day];
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