<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */
namespace App\Controller;
use App\Entity\Competition;
use App\Entity\Result;
use App\Entity\Team;
use App\Entity\Weighing;
use App\Form\ResultType;
use App\Form\TeamsFormType;
use App\Form\WeighingType;
use App\Services\TeamService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrganizerController extends AbstractController
{
    private $teamService;
    private $logger;
    /**
     * TODO
     *  visas sitas kontroleris turetu turet middleware, kuris checkina
     *  ar access hash teisingas
     *  jei access hash neteisingas -> redirectina i main page...
     * */

    /**
     * @param LoggerInterface $logger
     * @param TeamService $service
     */
    public function __construct(LoggerInterface $logger, TeamService $service)
    {
        $this->logger = $logger;
        $this->teamService = $service;
    }
    /**
     * @Route("/organizer/{hash}", name="organiserMain")
     */
    public function createTeamForm(Request $request, $hash)
    {
        $team = new Team();
        $teams = new Competition();
        $sectorsCount=2;
        for ($i=0; $i<$sectorsCount; $i++) {
            $teams->getTeams()->add($team);
        }
        $form = $this->createForm(TeamsFormType::class, $teams);
        $form->add('save', SubmitType::class, array("label" => "form.team_registration.create_button"));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->teamService->create($form->getData());
            $this->addFlash('success', "Komanda prideta");
        }
        return $this->render("team/addCommand.html.twig", array(
            "form" => $form->createView(),

        ));

    }
//    /**
//     * @Route("/organizer/{hash}", name="organiserMain")
//     */
//    public function index($hash)
//    {
//        return new Response("
//            <center>
//                <h1>
//                    Hoorray, organizatoriaus screenas! <br/>
//                    Tavo prieigos kodas: $hash
//                </h1>
//            </center>
//        ");
//    }
//}

    /**
     * @Route("/organizer/{hash}/results", name="organizerResults")
     */
    public function results($hash, Request $request)
    {
        $sectors = array(
          array("number" => 1),
          array("number" => 2),
          array("number" => 3),
          array("number" => 4),
          array("number" => 5),
          array("number" => 6),
          array("number" => 7)
        );

        $weighing = new Weighing();


        for($i = 0; $i < 3; $i++){
            $result = new Result();
            $weighing->addResult($result);
        }
        $form = $this->createForm(WeighingType::class, $weighing);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dump($data);
            $this->addFlash('success', "Rezultatai gauti...");
        }

        return $this->render("organizer/results.html.twig", array(
           "sectors" => $sectors,
            "form" => $form->createView()
        ));
    }


}
