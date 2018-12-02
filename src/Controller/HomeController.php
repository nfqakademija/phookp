<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Repository\CompetitionRepository;
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
        $goingCompetitions=$competitionService->getGoingCompetitions();
        return $this->render("home/index.html.twig",
            array(
                "goingCompetitions" => $goingCompetitions,
            ));

    }

    public function competitions(CompetitionService $competitionService){
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $expiredCompetitions=$competitionService->getExpiredCompetitions();
        return $this->render("home/competitions.html.twig",
            array(
                "futureCompetitions" => $futureCompetitions,
                "expiredCompetitions" => $expiredCompetitions
            ));
    }

}
