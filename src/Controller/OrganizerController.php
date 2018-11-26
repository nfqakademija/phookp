<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use App\Entity\Team;
use App\Form\SectorFormType;
use App\Form\TeamsFormType;
use App\Entity\Result;
use App\Entity\Weighing;
use App\Form\WeighingType;
use App\Services\HashService;
use App\Services\ResultService;
use App\Services\TeamService;
use App\Services\WeighingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;



class OrganizerController extends AbstractController implements IAuthorizedController
{
    /**
     * @Route("/organizer/{hash}", name="organizerMain")
     * @param Request $request
     * @param string $hash
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
                $notAddedNameMessage = $translator->trans("form.team_registration.notAddedName_message");
                if ($additionNotifications["addedTeamsQuantity"] > 0) {
                    if ($additionNotifications["notAddedName"] === true) {
                        $this->addFlash("danger", $notAddedNameMessage);
                    }
                } else {
                    $this->addFlash("danger", $notAddedNameMessage);
                }
            }
            $teamsArray = $competition->getTeams();
            return $this->render("team/addTeam.html.twig", array(
                "form" => $form->createView(),
                "sectors" => $sectorsCount,
                "teams" => $teamsArray,
            ));
        }
        return $this->redirectToRoute("home");
    }


    /**
     * @param $idTeam
     * @param TeamService $teamService
     * @Route("/organizer/{hash}/deleteTeam/{idTeam}")
     */
    public function deleteTeam($idTeam, TeamService $teamService)
    {

        $teamService->remove($idTeam);

    }


    /**
     * @Route("/organizer/{hash}/results/{teamId}/{weighingNr}", name="organizerResults")
     */
    public function results(string $hash, int $teamId, int $weighingNr = 1, Request $request,
                            HashService $hashService, ResultService $resultService, WeighingService $weighingService,
                            TeamService $teamService)
    {
        $competition = $hashService->findByHash($hash)->getCompetition();
        $weighings = $competition->getWeighings();
        $teams = $competition->getTeams();


        // Validation

        if(count($teams) < 1){
            $this->addFlash("error", "Klaida: negalima prideti rezultatu nepridejus dalyviu komandu!");
            $this->redirectToRoute("organizerMain", array("hash" => $hash));
        }

        if(count($weighings)+1 < $weighingNr)
        {
            $this->addFlash("error", "Klaida: negalite praleisti sverimu!");
            $this->redirectToRoute("organizerResults", array("hash" => $hash, "teamId" => $teams[0]->getId()));
        }

        if(!$teams->exists(function($key, $element) use ($teamId){
            return $teamId === $element->getId();
        }))
        {
            $this->addFlash("error", "Klaida: nurodyta komanda nedalyvauja varzybose!");
            $this->redirectToRoute("organiserMain", array("hash" => $hash));
        }

        $team = $teamService->find($teamId);

        if(count($weighings) === 0 || count($weighings) < $weighingNr){
            $weighing = new Weighing();

            for($i = 0; $i < 3; $i++){
                $result = new Result();
                $weighing->addResult($result);
            }
        }
        else{
            $weighing = $weighings[$weighingNr-1];
            $results = $resultService->getTeamResults($teamId, $weighing->getId());
            $weighing->setResults($results);
            for($i = 0; $i < 3; $i++){
                $result = new Result();
                $weighing->addResult($result);
            }
        }



        $form = $this->createForm(WeighingType::class, $weighing);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data->setCompetition($competition);
            $weighingService->create($data, $team, $resultService);
            $this->addFlash('success', "Rezultatai issaugoti...");
        }

        return $this->render("organizer/results.html.twig", array(
           "teams" => $teams,
           "form" => $form->createView(),
            "competition" => $competition,
            "weighings" => $weighings
        ));
    }


}
