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
        $expiredCompetitions = $competitionService->getExpiredCompetitions();
        $goingCompetitionsCount = count($goingCompetitions);
        switch ($goingCompetitionsCount) {
            case  0:
                $expiredCompetitions = array_slice($expiredCompetitions, 0, 2);
                return $this->render("home/index.html.twig",
                    [
                        "expiredCompetitions" => $expiredCompetitions,
                    ]);
            case  1:
                $expiredCompetitions = array_slice($expiredCompetitions, 0, 1);
                return $this->render("home/index.html.twig",
                    [
                        "goingCompetitions" => $goingCompetitions,
                        "expiredCompetitions" => $expiredCompetitions
                    ]);
            default:
                return $this->render("home/index.html.twig",
                    ["goingCompetitions" => $goingCompetitions]);
        }

    }

    /**
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function competitions(CompetitionService $competitionService)
    {
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $expiredCompetitionsYears=$competitionService->getExpiredCompetitionsYears();
        $expiredCompetitions = $competitionService->getExpiredCompetitions();
        return $this->render("home/competitions.html.twig",
            [
                "futureCompetitions" => $futureCompetitions,
                "expiredCompetitions" => $expiredCompetitions,
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
