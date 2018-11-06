<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use App\Entity\CommandForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OrganizerController extends Controller
{
    /**
     * @Route("/organizer", name="organizer")
     */
    public function new(Request $request)
    {
        $commandForm = new CommandForm();
        $form = $this->createFormBuilder($commandForm)
            ->add("commandName", TextType::class, array("label" => "Komandos pavadinimas"))
            ->add("commandEmail", TextType::class, array("label" => "Elektroninis paštas"))
            ->add("save", SubmitType::class, array("label" => "Pridėti"))
            ->getForm();
        return $this->render("team/addCommand.html.twig", array(
            "form" => $form->createView(),

        ));

    }


}