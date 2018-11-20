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
