<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Team;
use App\Form\TeamFormType;

class OrganizerController extends AbstractController
{


    /**
     * TODO
     *  visas sitas kontroleris turetu turet middleware, kuris checkina
     *  ar access hash teisingas
     *  jei access hash neteisingas -> redirectina i main page...
     * */

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

    /**
     * @Route("/organizer/{hash}", name="organiserMain")
     */
    public function index($hash)
    {
        return new Response("
            <center>
                <h1>
                    Hoorray, organizatoriaus screenas! <br/>
                    Tavo prieigos kodas: $hash
                </h1>
            </center>
        ");
    }

    /**
     * @Route("/organizer/{hash}/results", name="organizerResults")
     */
    public function results($hash)
    {
        $sectors = array(
          array("number" => 1),
          array("number" => 2),
          array("number" => 3),
          array("number" => 4),
          array("number" => 5),
          array("number" => 6),
          array("number" => 7)
        );
        return $this->render("organizer/results.html.twig", array(
           "sectors" => $sectors
        ));
    }


}