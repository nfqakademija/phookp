<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.3
 * Time: 22.38
 */

namespace App\Controller;

use App\Entity\SectionForm;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\CommandForm;
use App\Entity\ResultsForm;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EventController extends Controller
{
    /**
     * @Route("/event", name="event")
     */
    public function new(Request $request)
    {


        $event = array(array("commandName" => "zuviukai", "id" => 1, "sector" => 1),
            array("commandName" => "karpis", "id" => 2, "sector" => 2),
            array("commandName" => "debesys", "id" => 3, "sector" => null));
        $sectionForm = new SectionForm();
        $form = $this->createFormBuilder($sectionForm);
        $form->add('sectorId', CollectionType::class, array(
            // each entry in the array will be an "email" field
            'entry_type' => TextType::class,
            // these options are passed to each "email" type
            'entry_options' => array(
                "label"=> " ",
        ),
        ));
           $form->add("save", SubmitType::class, array("label" => "Išsaugoti"));
      $form = $form->getForm();
        return $this->render("home/sectors.html.twig", array(
            "form" => $form->createView(),
            "event" => $event
        ));

    }


}