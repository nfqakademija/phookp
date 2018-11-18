<?php
namespace App\Controller;
use App\Services\CompetitionService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

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
