<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use App\Entity\Competition;
use App\Services\TeamService;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use App\Entity\Team;
use App\Form\TeamFormType;
use App\Form\TeamsFormType;

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
     * @Route("/organizer", name="organizer")
     */
    public function createTeamForm(Request $request)
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

    /**
     * @Route("/organizer/{hash}", name="organiserMain")
     */
    public function index($hash)
    {
        return new Response("
            <center>
                <h1>
                    Hoorray, organizatoriaus screenas! <br/>
                    Tavo prieigos kodas: $hash
                </h1>
            </center>
        ");
    }


}