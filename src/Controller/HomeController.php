<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\EventForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $events = array(
            array(
                "eventName" => "Didžiausia žuvis",
                "date" => date("Y-m-d"
                ),
                "id" => 2,
            ),
            array(
                "eventName" => "Daugiausiai žuvų",
                "date" => date("Y-m-d"
                ),
                "id" => 1,
            ),
        );
        return $this->render("home/index.html.twig",
            array(
                "events" => $events,
            ));
    }

    /**
     * @Route("/home/eventForm", name="home.eventForm")
     */

    public function new(Request $request)
    {
        $eventForm = new EventForm();
        $eventForm->setStartDate(new \DateTime("tomorrow"));
        $eventForm->setEndDate(new \DateTime("tomorrow"));

        $form = $this->createFormBuilder($eventForm)
            ->add("eventName", TextType::class, array("label" => "Renginio pavadinimas"))
            ->add("email", TextType::class, array("label" => "Elektroninis paštas"))
            ->add("eventType", ChoiceType::class, array("label" => "Renginio tipas",
                    "choices" => array(
                        "Top5" => EventForm::TYPE_TOP,
                        "Didžiausia žuvis" => EventForm::TYPE_BIGGEST))
            )
            ->add("startDate", DateType::class, array("label" => "Renginio pradžia"))
            ->add("endDate", DateType::class, array("label" => "Renginio pabaiga"))
            ->add("save", SubmitType::class, array("label" => "Sukurti"))
            ->getForm();
        return $this->render("home/eventForm.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    /**
     * @Route("/home/event/{id}", name="home.event")
     */

    public function getResults($id)
    {

        $eventId = 1;
        $results = array(
            array(
                "sectorId" => "1",
                "commandName" => "pikts karpis",
                "amounts" => array("5", "5", "5"),
                "weights" => array("5000", "6000", "5000"),

            ),
            array(
                "sectorId" => "1",
                "commandName" => "zuvininkai",
                "amounts" => array("5", "4", "5", "4", "4"),
                "weights" => array("500", "6000", "500", "400"),
            )
        );
        if ($id==$eventId) {

            return $this->render("home/onGoingEvent.html.twig",
                array(
                    "results" => $results,
                    "numberOfStages" => 4,
                    "id" => $id,
                )
            );
        }
        else{
            return $this->render("home/noResults.html.twig",
                array(
                    "id"=> $id,
                ));
        }

    }


}
