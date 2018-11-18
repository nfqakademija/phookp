<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.29
 * Time: 21.19
 */
namespace App\Controller;
use App\Entity\Competition;
use App\Entity\Hash;
use App\Services\CompetitionService;
use App\Services\HashService;
use App\Entity\Team;
use App\Entity\Weighing;
use App\Entity\Result;
use App\Form\WeighingType;
use App\Form\TeamsFormType;
use App\Services\TeamService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrganizerController extends AbstractController
{
    private $teamService;
    private $logger;
    /**
     * TODO
     *  visas sitas kontroleris turetu turet middleware, kuris checkina
     *  ar access hash teisingas
     *  jei access hash neteisingas -> redirectina i main page...
     * */
    /**
     * @param LoggerInterface $logger
     * @param TeamService $service
     */
    public function __construct(LoggerInterface $logger, TeamService $service)
    {
        $this->logger = $logger;
        $this->teamService = $service;
    }
    /**
     * @Route("/organizer/{hash}", name="organiserMain")
     */
    public function createTeamForm(Request $request, $hash, HashService $hashService)
    {

        $data = ['teams'=>[]];
        $sectorsCount=2;
        for ($i=0; $i<$sectorsCount; $i++) {
            $team = new Team();
            $data['teams'][] = $team;
        }
        $form = $this->createForm(TeamsFormType::class, $data);
        $form->add('save', SubmitType::class, array("label" => "form.team_registration.create_button"));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash=$hashService->findByHash($hash);
            $this->teamService->addTeams($form->getData()['teams'], $hash->getCompetition());
            $this->addFlash('success', 'Komandos pridėtos');
        }
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
     * @Route("/organizer/{hash}/results/{teamId}/{weighingNr}", name="organizerResults")
     */
    public function results(string $hash, int $teamId, int $weighingNr = 1, Request $request, HashService $hashService, CompetitionService $competitionService)
    {
        $competition = $hashService->findByHash($hash)->getCompetition();
        $weighings = $competition->getWeighings();
        $teams = $competition->getTeams();


        // Validation

        if(count($teams) < 1){
            $this->addFlash("error", "Klaida: negalima prideti rezultatu nepridejus dalyviu komandu!");
            $this->redirectToRoute("organizerMain", array("hash" => $hash));
        }

        if(count($weighings)+1 < $weighingNr)
        {
            $this->addFlash("error", "Klaida: negalite praleisti sverimu!");
            $this->redirectToRoute("organizerResults", array("teamId" => $teams[0]->getId()));
        }

        if(!$teams->exists(function($key, $element) use ($teamId){
            return $teamId === $element->getId();
        }))
        {
            $this->addFlash("error", "Klaida: nurodyta komanda nedalyvauja varzybose!");
            $this->redirectToRoute("organiserMain", array("hash" => $hash));
        }

        if(count($weighings) === 0 || count($weighings) < $weighingNr){
            $weighing = new Weighing();
           /* $competition->addWeighing($weighing);
            $competitionService->create($competition);*/

            for($i = 0; $i < 3; $i++){
                $result = new Result();
                $weighing->addResult($result);
            }
        }
        else{
            $weighing = $weighings[$weighingNr-1];
        }



        $form = $this->createForm(WeighingType::class, $weighing);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dump($data);
            $this->addFlash('success', "Rezultatai gauti...");
        }

        return $this->render("organizer/results.html.twig", array(
           "teams" => $teams,
           "form" => $form->createView(),
            "competition" => $competition,
            "weighings" => $weighings
        ));
    }


}
