<?php
namespace App\Controller;
use App\Services\CompetitionService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
       /**
     * @Route("/", name="home")
     */
    public function index(CompetitionService $competitionService)
    {
        $competitions = $competitionService->getFutureCompetitions();
        return $this->render("home/index.html.twig",
            array(
                "competitions" => $competitions,
            ));
    }
}
