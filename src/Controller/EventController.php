<?php

namespace App\Controller;


use App\Services\EventService;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


use App\Form\EventFormType;

use App\Entity\Event;

class EventController extends AbstractController
{

    private $eventService;
    private $logger;


    public function __construct(LoggerInterface $logger, EventService $service)
    {
        $this->logger = $logger;
        $this->logger->notice("controllerio pradzia");
        $this->eventService = $service;
        $this->logger->notice("controllerio constructor pabaiga...");
    }

    /**
     * @Route("/event", name="event")
     */
    public function index()
    {
        $event = new Event();
        $form = $this->createForm(EventFormType::class, $event);
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/event/create", name="eventCreate")
     */
    public function create(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventFormType::class, $event);

        $form->handleRequest($request);
//        dump($form->getData());
        if($form->isSubmitted() && $form->isValid()){
            $this->eventService->create($form->getData());
            $this->addFlash('success', 'Renginys sekmingai pridetas! Patikrinkite nurodyta el. pasta, jums buvo issiustas laiskas su renginio patvirtinimo ir administravimo nuoroda.');
        }


        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/event/get/{id}", name="getEvent", methods={"GET", "HEAD"})
     */

    public function get($id)
    {
        $this->logger->notice("get method called");
        $event = $this->eventService->get($id);
        $this->logger->notice("find ran...");

        return new Response(dump($event));


    }
}
