<?php
namespace App\Controller;
use App\Services\CompetitionService;
use App\Services\HashService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompetitionFormType;
use App\Entity\Competition;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Translation\TranslatorInterface;

class CompetitionController extends AbstractController
{
    private $competitionService;
    private $logger;
    private $translator;

    /**
     * CompetitionController constructor.
     * @param LoggerInterface $logger
     * @param CompetitionService $service
     * @param TranslatorInterface $translator
     */
    public function __construct(LoggerInterface $logger, CompetitionService $service, TranslatorInterface $translator)
    {
        $this->logger = $logger;
        $this->logger->notice("controllerio pradzia");
        $this->competitionService = $service;
        $this->translator=$translator;
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
     * @param HashService $hashService
     * @return Response
     * @Route("/competition/create", name="competitionCreate")
     */
    public function create(Request $request, HashService $hashService)
    {
        $competition = new Competition();
        $competition->setCompetitionDate(new \DateTime("tomorrow"));
        $form = $this->createForm(CompetitionFormType::class, $competition);
        $form->add('save', SubmitType::class, array("label" => "form.competition_registration.create_button"));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $competition = $this->competitionService->create($form->getData());
            $hash = $hashService->create($competition);
            $accessLink = $this->generateUrl("organiserMain", array("hash" => $hash->getHash()), UrlGeneratorInterface::ABSOLUTE_URL);
            $message=$this->translator->trans("form.competition_registration.success_message");
            $this->addFlash('success', "$message: <a href='$accessLink'>$accessLink<a/>");
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
