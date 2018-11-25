<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.24
 * Time: 11.45
 */

namespace App\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Twig\Environment;


class CompetitionCreatedSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var Environment
     */
    private $engine;

    /**
     * CompetitionCreatedSubscriber constructor.
     * @param \Swift_Mailer $mailer
     * @param UrlGeneratorInterface $urlGenerator
     * @param TranslatorInterface $translator
     * @param Environment $engine
     */
    public function __construct(
        \Swift_Mailer $mailer,
        UrlGeneratorInterface $urlGenerator,
        TranslatorInterface $translator,
    Environment $engine
    ) {
        $this->mailer = $mailer;
        $this->urlGenerator = $urlGenerator;
        $this->translator = $translator;
        $this->engine=$engine;
    }

    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            CompetitionCreatedEvent::NAME => "onCompetitionCreated"
        ];
    }

    /**
     * @param CompetitionCreatedEvent $event
     */
    public function onCompetitionCreated(CompetitionCreatedEvent $event)
    {
        $competition = $event->getCompetition();
        $email = $competition->getCompetitionOrganiserEmail();
        $hash = $competition->getCompetitionHashes()->first();
        $accessLink = $this->urlGenerator->generate("organizerMain", array("hash" => $hash->getHash()),
            UrlGeneratorInterface::ABSOLUTE_URL);
        $subjectMessage = $this->translator->trans("mail.subject_message");
        try {
            $message = (new \Swift_Message($subjectMessage))
                ->setFrom('sportinekarpiuzukle@gmail.com')
                ->setTo($email)
                ->setBody($this->engine->render("email/email.html.twig", array(
                    "accessLink" => $accessLink
                )),
                            'text/html');
            $this->mailer->send($message);
        } catch (\Twig_Error_Loader $e) {
        } catch (\Twig_Error_Runtime $e) {
        } catch (\Twig_Error_Syntax $e) {
        }
    }
}