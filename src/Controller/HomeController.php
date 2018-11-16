<?php

namespace App\Controller;
use App\Services\CompetitionService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
class HomeController extends Controller
{
    private $competitionService;
    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService = $competitionService;
    }
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        //$competitions = $this->competitionService->getFutureCompetitions();
        //dump($competitions);
        return $this->render("home/index.html.twig",
            array(
                "competitions" => "futureCompetitions",
            ));
    }
    /**
     * @Route("/home/competition/{id}", name="home.competition")
     */
    public function getResults($id)
    {
        $competitionId = 1;
        $results = array(
            array(
                "sectorId" => "1",
                "commandName" => "pikts karpis",
                "amounts" => array("5", "5", "5"),
                "weights" => array("5000", "6000", "5000"),
            ),
            array(
                "sectorId" => "1",
                "commandName" => "zuvininkai",
                "amounts" => array("5", "4", "5", "4", "4"),
                "weights" => array("500", "6000", "500", "400"),
            )
        );
        if ($id==$competitionId) {
            return $this->render("home/onGoingEvent.html.twig",
                array(
                    "results" => $results,
                    "numberOfStages" => 4,
                    "id" => $id,
                )
            );
        }
        else{
            return $this->render("home/noResults.html.twig",
                array(
                    "id"=> $id,
                ));
        }
    }
}