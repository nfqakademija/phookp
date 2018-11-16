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
        $competitions = $this->competitionService->getFutureCompetitions();
        //dump($competitions);
        return $this->render("home/index.html.twig",
            array(
                "competitions" => $competitions,
            ));
    }

}