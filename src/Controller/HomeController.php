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
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $expiredCompetitions = $competitionService->getExpiredCompetitions();
        $expiredCompetitions = array_slice($expiredCompetitions, 0,2);
        $futureCompetition = array_shift($futureCompetitions);
        return $this->render("home/index.html.twig",
            [
                "goingCompetitions" => $goingCompetitions,
                "futureCompetition" => $futureCompetition,
                "expiredCompetitions" => $expiredCompetitions,
            ]);

    }

    /**
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function competitions(CompetitionService $competitionService)
    {
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $expiredCompetitions = $competitionService->getExpiredCompetitions();
        return $this->render("home/competitions.html.twig",
            [
                "futureCompetitions" => $futureCompetitions,
                "expiredCompetitions" => $expiredCompetitions
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
