<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Team;
use App\Form\TeamFormType;

class OrganizerController extends AbstractController
{
    /**
     * @Route("/organizer", name="organizer")
     */
    public function new(Request $request)
    {
        $teamForm = new Team();
        $form = $this->createForm(TeamFormType::class, $teamForm);
        $form->add('save', SubmitType::class, array("label" => "Sukurti"));
        $form->handleRequest($request);
        return $this->render("team/addCommand.html.twig", array(
            "form" => $form->createView(),

        ));

    }


}