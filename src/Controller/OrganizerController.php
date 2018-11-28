<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */
namespace App\Controller;

use App\Entity\Result;
use App\Entity\Team;
use App\Entity\Weighing;
use App\Form\TeamsFormType;
use App\Form\WeighingType;
use App\Services\HashService;
use App\Services\ResultService;
use App\Services\TeamService;
use App\Services\WeighingService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;


class OrganizerController extends AbstractController implements IAuthorizedController
{
    private $teamService;
    private $logger;

    public function __construct(LoggerInterface $logger, TeamService $service)
    {
        $this->logger = $logger;
        $this->teamService = $service;
    }


    /**
     * @Route("/organizer/{hash}", name="organizerMain")
     * @param Request $request
     * @param string $hash
     * @param HashService $hashService
     * @param TeamService $teamService
     * @param TranslatorInterface $translator
     * @return Response
     *
     */
    public function createTeam(
        Request $request,
        string $hash,
        HashService $hashService,
        TeamService $teamService,
        TranslatorInterface $translator
    ) {
        $hash = $hashService->findByHash($hash);
        if ($hash) {
            $data = ['teams' => []];
            $competition = $hash->getCompetition();
            $teamsCount = $teamService->countTeams($competition);
            for ($i = 0; $i < $teamsCount; $i++) {
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
                return $this->redirectToRoute("organizerMain", ['hash' => $hash->getHash()]);
            }
            $teamsArray = $competition->getTeams();

            return $this->render("team/addTeam.html.twig", [
                "form" => $form->createView(),
                "teamsCount" => $teamsCount,
                "teams" => $teamsArray,
            ]);
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
     * @Route("/organizer/{hash}/teamsSectors", name="organizerMain.teamsSectors")
     * @param Request $request
     * @param string $hash
     * @param HashService $hashService
     * @param TeamService $teamService
     * @return Response
     */
    public function addSectors(Request $request, string $hash, HashService $hashService, TeamService $teamService)
    {
        $hash = $hashService->findByHash($hash);
        $competition = $hash->getCompetition();
        $teams=$competition->getTeams();
        $data = ['teams' => $competition->getTeams()->toArray()];
        $form = $this->createForm(TeamsSectorsFormType::class, $data);
        $form->add('save', SubmitType::class, array("label" => "form.team_registration_sectors.add_button"));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $teamService->addTeamsSectors($form->getData()['teams']);
            $this->addFlash("success", "sektoriai sekmingai prideti");

        }
        return $this->render("team/sectors.html.twig", [
            "form" => $form->createView(),
            "teams"=>$teams,
        ]);

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

        if($teamId === null)
            $teamId = $teams[0]->getId();

        // Validation

        if (count($teams) < 1) {
            $this->addFlash("error", "Klaida: negalima prideti rezultatu nepridejus dalyviu komandu!");
            $this->redirectToRoute("organizerMain", array("hash" => $hash));
        }

        if (count($weighings) + 1 < $weighingNr) {
            $this->addFlash("error", "Klaida: negalite praleisti sverimu!");
            return $this->redirectToRoute("organizerResults", array("hash" => $hash, "teamId" => $teams[0]->getId(), "weighingNr" => count($weighings) + 1));
        }

        if (!$teams->exists(function ($key, $element) use ($teamId) {
            return $teamId === $element->getId();
        })) {
            $this->addFlash("error", "Klaida: nurodyta komanda nedalyvauja varzybose!");
            $this->redirectToRoute("organiserMain", array("hash" => $hash));
        }

        $team = $teamService->find($teamId);

        if (count($weighings) === 0 || count($weighings) < $weighingNr) {
            $weighing = new Weighing();

            for ($i = 0; $i < 5; $i++) {
                $result = new Result();
                $weighing->addResult($result);
            }
        } else {
            $weighing = $weighings[$weighingNr - 1];
            $results = $resultService->getTeamResults($teamId, $weighing->getId());
            $weighing->setResults($results);
            do{
                $result = new Result();
                $weighing->addResult($result);
            }
            while(count($weighing->getResults()) < 5);

        }


        $form = $this->createForm(WeighingType::class, $weighing);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data->setCompetition($competition);
            $weighingService->create($data, $team);
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
