<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamsFormType;
use App\Services\HashService;
use App\Services\TeamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Routing\Annotation\Route;


class OrganizerController extends AbstractController
{
    /**
     * @Route("/organizer/{hash}", name="organizerMain")
     * @param Request $request
     * @param $hash
     * @param HashService $hashService
     * @param TeamService $teamService
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function createTeam(
        Request $request,
        string $hash,
        HashService $hashService,
        TeamService $teamService,
        TranslatorInterface $translator
    )
    {
        $hash = $hashService->findByHash($hash);
        if ($hash) {
            $data = ['teams' => []];
            $competition = $hash->getCompetition();
            $sectorsCount = $teamService->countSectors($competition);
            for ($i = 0; $i < $sectorsCount; $i++) {
                $team = new Team();
                $data['teams'][] = $team;
            }
            $form = $this->createForm(TeamsFormType::class, $data);
            $form->add('save', SubmitType::class, array("label" => "form.team_registration.create_button"));
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $additionNotifications = $teamService->addTeams($form->getData()['teams'], $competition);
                $successMessage = $translator->trans("form.team_registration.success_message");
                $notAddedNameMessage = $translator->trans("form.team_registration.notAddedName_message");
                if ($additionNotifications["addedTeamsQuantity"] > 0) {
                    $this->addFlash("success", $successMessage . $additionNotifications['addedTeamsQuantity']);
                    if ($additionNotifications["notAddedName"] === true) {
                        $this->addFlash("danger", $notAddedNameMessage);
                    }
                } else {
                    $this->addFlash("danger", $notAddedNameMessage);
                }
            }
            return $this->render("team/addCommand.html.twig", array(
                "form" => $form->createView(),
                "sectors" => $sectorsCount,
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

