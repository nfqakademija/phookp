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
use App\Form\TeamsSectorsFormType;
use App\Form\WeighingFormType;
use App\Services\HashService;
use App\Services\ResultService;
use App\Services\TeamService;
use App\Services\WeighingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;


class OrganizerController extends AbstractController implements IAuthorizedController
{


    public function index($hash){

        return $this->render("organizerPanel/organizerPanel.html.twig", [
          "hash"=>$hash,
        ]);

    }
    /**
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
                $errorMessage = $translator->trans("form.team_registration.not_added_name_message");

                if ($additionNotifications["addedTeamsQuantity"] > 0) {
                    if ($additionNotifications["isAddedName"] === false) {
                        $this->addFlash("danger", $errorMessage);
                    }
                } else {
                    $this->addFlash("danger", $errorMessage);
                }
                return $this->redirectToRoute("organizerCreateTeams", ['hash' => $hash->getHash()]);
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
     */
    public function deleteTeam($idTeam, TeamService $teamService)
    {
        $teamService->remove($idTeam);

    }

    /**
     * @param Request $request
     * @param string $hash
     * @param HashService $hashService
     * @param TeamService $teamService
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function addSectors(
        Request $request,
        string $hash,
        HashService $hashService,
        TeamService $teamService,
        TranslatorInterface $translator
    ) {
        $hash = $hashService->findByHash($hash);
        $competition = $hash->getCompetition();
        $teams = $competition->getTeams();
        $data = ['teams' => $competition->getTeams()->toArray()];
        $form = $this->createForm(TeamsSectorsFormType::class, $data);
        $form->add('save', SubmitType::class, array("label" => "form.team_sectors_assignment.add_button"));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $isAdded = $teamService->addTeamsSectors($form->getData()['teams']);

            if ($isAdded === true) {
                $this->addFlash("success", $translator->trans("form.team_sectors_assignment.success_message"));
            }
        }
        return $this->render("team/sectors.html.twig", [
            "form" => $form->createView(),
            "teams" => $teams,
        ]);

    }

    /**
     * @param string $hash
     * @param int $teamId
     * @param int $weighingNr
     * @param Request $request
     * @param HashService $hashService
     * @param ResultService $resultService
     * @param WeighingService $weighingService
     * @param TeamService $teamService
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function results(
        string $hash,
        int $teamId,
        int $weighingNr = 1,
        Request $request,
        HashService $hashService,
        ResultService $resultService,
        WeighingService $weighingService,
        TeamService $teamService,
        TranslatorInterface $translator
    ) {
        $competition = $hashService->findByHash($hash)->getCompetition();
        $weighings = $competition->getWeighings();
        $teams = $competition->getTeams();

        if ($teamId === null) {
            $teamId = $teams[0]->getId();
        }


        if (count($teams) < 1) {
            $this->addFlash("error", $translator->trans("form.results_entry.error_not_added_teams_message"));
            $this->redirectToRoute("organizerMain", array("hash" => $hash));
        }

        if (count($weighings) + 1 < $weighingNr) {
            $this->addFlash("error", $translator->trans("form.results_entry.error_skip_weighing_message"));
            return $this->redirectToRoute("organizerResults",
                array("hash" => $hash, "teamId" => $teams[0]->getId(), "weighingNr" => count($weighings) + 1));
        }

        if (!$teams->exists(function ($key, $element) use ($teamId) {
            return $teamId === $element->getId();
        })) {
            $this->addFlash("error", $translator->trans("form.results_entry.error_not_found_team_message"));
            $this->redirectToRoute("organizerMain", array("hash" => $hash));
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
            do {
                $result = new Result();
                $weighing->addResult($result);
            } while (count($weighing->getResults()) < 5);

        }


        $form = $this->createForm(WeighingFormType::class, $weighing);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data->setCompetition($competition);
            $weighingService->create($data, $team);
            $this->addFlash('success', $translator->trans("form.results_entry.success_message"));
        }

        return $this->render("organizer/results.html.twig", array(
            "teams" => $teams,
            "form" => $form->createView(),
            "competition" => $competition,
            "weighings" => $weighings
        ));
    }

}
