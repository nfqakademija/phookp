<?php

namespace App\Controller;

use App\Services\CompetitionService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function index(CompetitionService $competitionService)
    {
        $goingCompetitions = $competitionService->getGoingCompetitions();
        $expiredCompetitionsYears = $competitionService->getExpiredCompetitionsYears();
        $years=array_values($expiredCompetitionsYears)[0][1];
        $expiredCompetitions =  $competitionService->getExpiredCompetitionsByYears($years);
        $goingCompetitionsCount = count($goingCompetitions);
        $competitions=[];
        switch ($goingCompetitionsCount) {
            case  0:
                $expiredCompetitions = array_slice($expiredCompetitions, 0, 2);
                $competitions=
                    [
                        "expiredCompetitions" => $expiredCompetitions,
                    ];
                break;
            case  1:
                $expiredCompetitions = array_slice($expiredCompetitions, 0, 1);
                $competitions=
                    [
                        "goingCompetitions" => $goingCompetitions,
                        "expiredCompetitions" => $expiredCompetitions
                    ];
                break;
            default:
                $competitions=
                    ["goingCompetitions" => $goingCompetitions];
                break;
        }
        return $this->render("home/index.html.twig",
            [
                "competitions" => $competitions,
            ]);

    }

    /**
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function competitions( CompetitionService $competitionService)
    {
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $expiredCompetitionsYears = $competitionService->getExpiredCompetitionsYears();
        $years=array_values($expiredCompetitionsYears)[0][1];
        $expiredCompetitionsByYears = $competitionService->getExpiredCompetitionsByYears($years);

        return $this->render("home/competitions.html.twig",
            [
                "futureCompetitions" => $futureCompetitions,
                "expiredCompetitions" => $expiredCompetitionsByYears,
                "expiredCompetitionsYears" => $expiredCompetitionsYears,
            ]);
    }

    /**
     * @param string $years
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function competitionsByYears(string $years,CompetitionService $competitionService)
    {
        $expiredCompetitionsYears = $competitionService->getExpiredCompetitionsYears();
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $expiredCompetitionsByYears = $competitionService->getExpiredCompetitionsByYears($years);
        return $this->render("home/competitions.html.twig",
            [
                "futureCompetitions" => $futureCompetitions,
                "expiredCompetitions" => $expiredCompetitionsByYears,
                "expiredCompetitionsYears" => $expiredCompetitionsYears,

            ]);
    }


    /**
     * @return Response
     */
    public function aboutUs()
    {
        return $this->render("home/aboutUs.html.twig",
            [

            ]);
    }

}
