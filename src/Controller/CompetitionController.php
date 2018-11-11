<?php

namespace App\Controller;


use App\Services\CompetitionService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompetitionFormType;
use App\Entity\Competition;

class CompetitionController extends AbstractController
{

    private $competitionService;
    private $logger;

    /**
     * CompetitionController constructor.
     * @param LoggerInterface $logger
     * @param CompetitionService $service
     *
     */
    public function __construct(LoggerInterface $logger, CompetitionService $service)
    {
        $this->logger = $logger;
        $this->logger->notice("controllerio pradzia");
        $this->competitionService = $service;
        $this->logger->notice("controllerio constructor pabaiga...");
    }

    /**
     * @Route("/competition", name="competition")
     */
    /*
    public function index()
    {
        return $this->render('competition/index.html.twig', [
            'controller_name' => 'CompetitionController',
        ]);
    }
    */

    /**
     * @param Request $request
     * @return Response
     * @Route("/competition/create", name="competitionCreate")
     */
    public function create(Request $request)
    {
        $competition = new Competition();
        $competition->setCompetitionDate(new \DateTime("tomorrow"));
        $form = $this->createForm(CompetitionFormType::class, $competition);
        $form->add('save', SubmitType::class, array("label" => "Sukurti"));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->competitionService->create($form->getData());
            $this->addFlash('success', 'Renginys sekmingai pridetas! Patikrinkite nurodyta el. pasta, jums buvo issiustas laiskas su renginio patvirtinimo ir administravimo nuoroda.');
        }

        return $this->render("competition/competitionForm.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    /**
     * @param string $id
     * @return Response
     * @Route("/competition/get/{id}", name="getCompetition", methods={"GET", "HEAD"})
     */

    public function get($id)
    {
        $this->logger->notice("get method called");
        $competition = $this->competitionService->get($id);
        $this->logger->notice("find ran...");

        return new Response(dump($competition));

    }
}