<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 00.59
 */

namespace App\EventSubscriber;

use App\Entity\Competition;
use App\Event\CompetitionConfirmedEvent;
use App\Services\CompetitionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CompetitionConfirmedSubscriber implements EventSubscriberInterface
{
    /**
     * @var CompetitionService
     */
    private $competitionService;

    /**
     * CompetitionConfirmedSubscriber constructor.
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
            CompetitionConfirmedEvent::NAME => "onCompetitionConfirmed"
        ];
    }

    /**
     * @param CompetitionConfirmedEvent $event
     */
    public function onCompetitionConfirmed(CompetitionConfirmedEvent $event)
    {
        $competition = $event->getCompetition();
        $this->competitionService->changeStatus(Competition::STATUS_CONFIRMED, $competition);
    }
}