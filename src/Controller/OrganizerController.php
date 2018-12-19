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
use App\Event\CompetitionConfirmedEvent;
use App\Event\CompetitionFinishedEvent;
use App\Event\CompetitionStartedEvent;
use App\Form\TeamsFormType;
use App\Form\TeamsSectorsFormType;
use App\Form\WeighingFormType;
use App\Services\CompetitionService;
use App\Services\HashService;
use App\Services\ResultService;
use App\Services\TeamService;
use App\Services\WeighingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;


class OrganizerController extends AbstractController implements AuthorizedControllerInterface
{

    /**
     * @param $hash
     * @param HashService $hashService
     * @param EventDispatcherInterface $dispatcher
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function main(
        $hash,
        HashService $hashService,
        EventDispatcherInterface $dispatcher,
        TranslatorInterface $translator
    ) {
        $competition = $hashService->findByHash($hash)->getCompetition();
        switch ($competition->getCompetitionStatus()) {
            case Competition::STATUS_UNCONFIRMED:
                $event = new CompetitionConfirmedEvent($competition);
                $dispatcher->dispatch(CompetitionConfirmedEvent::NAME, $event);
                return $this->render("organizer/stepper/steps/instruction.html.twig", [
                    "hash" => $hash,
                    "competition" => $competition,
                ]);
            case Competition::STATUS_CONFIRMED:
                return $this->render("organizer/stepper/steps/instruction.html.twig", [
                    "hash" => $hash,
                    "competition" => $competition,
                ]);
            case Competition::STATUS_STARTED:
                return $this->redirectToRoute("organizerResults", [
                    'hash' => $hash,
                    'teamId' => $competition->getTeams()->first()->getId(),
                    'weighingNr' => 1
                ]);
            default:
                $this->addFlash("success", $translator->trans("competition.finished_message"));
                return $this->redirectToRoute("home");

        }
    }

    public function instruction(string $hash, HashService $hashService){

        return $this->render("organizer/stepper/steps/instruction.html.twig", [
            "hash" => $hash,
            "competition" => $hashService->findByHash($hash)->getCompetition()
        ]);
    }

    public function start(string $hash, HashService $hashService){
        $competition = $hashService->findByHash($hash)->getCompetition();
        return $this->render("organizer/stepper/steps/start.html.twig",
            [
                "hash" => $hash,
                "competition" => $competition
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
        $competition = $hashService->findByHash($hash)->getCompetition();
        $data = ['teams' => []];
        $teamsCount = $teamService->countTeams($competition);
        for ($i = 0; $i < $teamsCount; $i++) {
            $team = new Team();
            $data['teams'][] = $team;
        }
        $form = $this->createForm(TeamsFormType::class, $data, ['attr' => ['class' => 'u-min-width-60']]);
        $form->add('save', SubmitType::class,
            array("label" => "form.team_registration.create_button", "attr" => ["class" => "button"]));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $isAdded = $teamService->addTeams($form->getData()['teams'], $competition);
            if (!$isAdded) {
                $this->addFlash("danger", $translator->trans("form.team_registration.not_added_name_message"));
            }
            return $this->redirectToRoute("organizerCreateTeams", ['hash' => $hash]);
        }
        return $this->render("organizer/stepper/steps/addTeam.html.twig", [
            "form" => $form->createView(),
            "teamsCount" => $teamsCount,
            "teams" => $competition->getTeams(),
            "hash" => $hash,
            "competition" => $competition
        ]);

    }

    /**
     * @param $idTeam
     * @param TeamService $teamService
     * @return Response
     */
    public function deleteTeam($idTeam, TeamService $teamService)
    {
        $teamService->remove($idTeam);

        return new Response();

    }

    /**
     * @param Request $request
     * @param string $hash
     * @param HashService $hashService
     * @param TeamService $teamService
     * @param TranslatorInterface $translator
     * @param EventDispatcherInterface $dispatcher
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function addSectors(
        Request $request,
        string $hash,
        HashService $hashService,
        TeamService $teamService,
        TranslatorInterface $translator, CompetitionService $competitionService, EventDispatcherInterface $dispatcher
    ) {
        $competition = $hashService->findByHash($hash)->getCompetition();

        if (!$competitionService->competitionStatus($competition, Competition::STATUS_STARTED)) {
            $event = new CompetitionStartedEvent($competition);
            $dispatcher->dispatch(CompetitionStartedEvent::NAME, $event);
        }

        $teamId = $competition->getTeams()->first()->getId();
        $data = ['teams' => $competition->getTeams()->toArray()];
        $form = $this->createForm(TeamsSectorsFormType::class, $data);
        $form->add('save', SubmitType::class,
            array("label" => "form.team_sectors_assignment.add_button", "attr" => ["class" => "button"]));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $isAdded = $teamService->addTeamsSectors($form->getData()['teams'], $competition);
            if ($isAdded) {
                $this->addFlash("success", $translator->trans("form.team_sectors_assignment.success_message"));
                return $this->redirectToRoute("organizerResults",
                    ['hash' => $hash, 'teamId' => $teamId, "weighingNr" => 1]);
            } else {
                $this->addFlash("danger", $translator->trans("form.team_sectors_assignment.error_message"));
            }
        }
        return $this->render("organizer/stepper/steps/sectors.html.twig", [
            "form" => $form->createView(),
            "teams" => $competition->getTeams(),
            "hash" => $hash,
            "competition" => $competition
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
            return $this->redirectToRoute("organizerMain",
                array("hash" => $hash, "teamId" => $teams[0]->getId(), "weighingNr" => 1));
        }

        $team = $teamService->find($teamId);

        if (count($weighings) === 0 || count($weighings) < $weighingNr) {
            $weighing = new Weighing();

            for ($i = 0; $i < 1; $i++) {
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
            } while (count($weighing->getResults()) < 1);

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
            "weighings" => $weighings,
            "hash" => $hash,
            "teamId" => $teamId,
            "weighingNr" => $weighingNr,
        ));
    }

    /**
     * @param $hash
     * @param HashService $hashService
     * @param CompetitionService $competitionService
     * @param EventDispatcherInterface $dispatcher
     * @param TranslatorInterface $translator
     * @return RedirectResponse
     */
    public function finish(
        $hash,
        HashService $hashService,
        CompetitionService $competitionService,
        EventDispatcherInterface $dispatcher,
        TranslatorInterface $translator
    ) {
        $competition = $hashService->findByHash($hash)->getCompetition();
        $isFinished = $competitionService->competitionStatus($competition, Competition::STATUS_FINISHED);
        if ($isFinished === false) {
            $event = new CompetitionFinishedEvent($competition);
            $dispatcher->dispatch(CompetitionFinishedEvent::NAME, $event);
        }
        $this->addFlash("success", $translator->trans("competition.finished_message"));
        return $this->redirectToRoute("home");
    }
}