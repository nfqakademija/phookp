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
     * CompetitionCreatedSubscriber constructor.
     * @param \Swift_Mailer $mailer
     * @param UrlGeneratorInterface $urlGenerator
     * @param TranslatorInterface $translator
     */
    public function __construct(
        \Swift_Mailer $mailer,
        UrlGeneratorInterface $urlGenerator,
        TranslatorInterface $translator
    ) {
        $this->mailer = $mailer;
        $this->urlGenerator = $urlGenerator;
        $this->translator = $translator;
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
        $message = (new \Swift_Message($subjectMessage))
            ->setFrom('sportinekarpiuzukle@gmail.com')
            ->setTo($email)
            ->setBody($accessLink);
        $this->mailer->send($message);

    }
}