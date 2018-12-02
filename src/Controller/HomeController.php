<?php

namespace App\Controller;

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
        $futureCompetitions = $competitionService->getFutureCompetitions();
        $goingCompetitions=$competitionService->getGoingCompetitions();
        $expiredCompetitions=$competitionService->getExpiredCompetitions();
        return $this->render("home/index.html.twig",
            array(
                "futureCompetitions" => $futureCompetitions,
                "goingCompetitions" => $goingCompetitions,
                "expiredCompetitions" => $expiredCompetitions
            ));

    }

}
