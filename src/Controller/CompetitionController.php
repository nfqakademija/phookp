<?php

namespace App\Controller;

use App\Event\CompetitionCreatedEvent;
use App\Services\CompetitionService;
use App\Services\ResultsCalculationService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompetitionFormType;
use App\Entity\Competition;
use Symfony\Component\Translation\TranslatorInterface;

class CompetitionController extends AbstractController
{
    /**
     * @param Request $request
     * @param CompetitionService $competitionService
     * @param TranslatorInterface $translator
     * @param EventDispatcherInterface $dispatcher
     * @return Response
     */
    public function createCompetition(Request $request, CompetitionService $competitionService, TranslatorInterface $translator, EventDispatcherInterface $dispatcher)
    {
        $competition = new Competition();
        $competition->setCompetitionDate(new \DateTime("tomorrow"));
        $form = $this->createForm(CompetitionFormType::class, $competition);
        $form->add('save', SubmitType::class, array("label" => "form.competition_registration.create_button", "attr" => ["class" => "button"]));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $competition = $competitionService->create($form->getData());
            $event = new CompetitionCreatedEvent($competition);
            $dispatcher->dispatch(CompetitionCreatedEvent::NAME, $event);
            $message = $translator->trans("form.competition_registration.success_message");
            $this->addFlash('success', $message);
            return $this->redirectToRoute("home");
        }

        return $this->render("competition/competitionForm.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    /**
     * @param Competition $competition
     * @param CompetitionService $competitionService
     * @return Response
     */
    public function getCompetition(Competition $competition, CompetitionService $competitionService)
    {
        $competition = $competitionService->get($competition);
        return new Response(dump($competition));
    }

    public function results(Competition $competition, ResultsCalculationService $calculationService)
    {
        $resultsArray = $calculationService->competitionTotalResults($competition);

        return $this->render("results/total.html.twig", [
            "competition" => $competition,
            "results" => $resultsArray
        ]);
    }
}
