<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 13.44
 */

namespace App\EventSubscriber;


use App\Entity\Competition;
use App\Event\CompetitionStartedEvent;
use App\Services\CompetitionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CompetitionStartedSubscriber implements EventSubscriberInterface
{
    /**
     * @var CompetitionService
     */
    private $competitionService;

    /**
     * CompetitionStartedSubscriber constructor.
     * @param CompetitionService $competitionService
     */
    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            CompetitionStartedEvent::NAME => "onCompetitionStarted"
        ];
    }

    /**
     * @param CompetitionStartedEvent $event
     */
    public function onCompetitionStarted(CompetitionStartedEvent $event)
    {
        $competition = $event->getCompetition();
        $this->competitionService->changeStatus(Competition::STATUS_STARTED, $competition);
    }
}