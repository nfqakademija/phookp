<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Services\CompetitionService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function index(CompetitionService $competitionService)
    {
        //$competitions = $competitionService->getFutureCompetitions();
        return $this->render("home/index.html.twig",
            array(
                "competitions" => new Competition(),
            ));
    }
}
