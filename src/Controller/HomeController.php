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
        if ($goingCompetitions != null) {
            $competitions = $goingCompetitions;
        } else {
            $competitions = [array_shift($expiredCompetitions)];
        }
        return $this->render("home/index.html.twig",
            [
                "competitions" => $competitions
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
