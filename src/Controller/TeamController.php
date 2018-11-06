<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SectionForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class TeamController extends AbstractController
{
    /**
     * @Route("/team", name="team")
     */
    public function index()
    {
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
        ]);
    }

    /**
     * @Route("/team/sector", name="teamSector")
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
    return $this->render("team/sectors.html.twig", array(
    "form" => $form->createView(),
    "event" => $event
    ));

    }

}
