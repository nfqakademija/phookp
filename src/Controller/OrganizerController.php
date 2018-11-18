<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use App\Entity\Competition;
use App\Entity\Hash;
use App\Services\CompetitionService;
use App\Services\HashService;
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
use Symfony\Component\Translation\TranslatorInterface;

class OrganizerController extends AbstractController
{
    private $teamService;
    private $logger;
    private $translator;
    /**
     * TODO
     *  visas sitas kontroleris turetu turet middleware, kuris checkina
     *  ar access hash teisingas
     *  jei access hash neteisingas -> redirectina i main page...
     * */
    /**
     * @param LoggerInterface $logger
     * @param TeamService $service
     * @param TranslatorInterface $translator
     */
    public function __construct(LoggerInterface $logger, TeamService $service, TranslatorInterface $translator)
    {
        $this->logger = $logger;
        $this->teamService = $service;
        $this->translator = $translator;
    }

    /**
     * @Route("/organizer/{hash}", name="organiserMain")
     * @param Request $request
     * @param $hash
     * @param HashService $hashService
     * @return Response
     */
    public function createTeamForm(Request $request, $hash, HashService $hashService)
    {
        $hash = $hashService->findByHash($hash);
        if ($hash) {
            $data = ['teams' => []];
            $sectorsCount = 2;
            for ($i = 0; $i < $sectorsCount; $i++) {
                $team = new Team();
                $data['teams'][] = $team;
            }
            $form = $this->createForm(TeamsFormType::class, $data);
            $form->add('save', SubmitType::class, array("label" => "form.team_registration.create_button"));
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $this->teamService->addTeams($form->getData()['teams'], $hash->getCompetition());
                $message = $this->translator->trans("form.team_registration.success_message");
                $this->addFlash('success', $message);
            }
            return $this->render("team/addCommand.html.twig", array(
                "form" => $form->createView(),
            ));
        }
        return $this->redirectToRoute("home");
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
}

