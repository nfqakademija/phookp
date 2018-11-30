<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 14.00
 */

namespace App\EventSubscriber;


use App\Entity\Competition;
use App\Event\CompetitionFinishedEvent;
use App\Services\CompetitionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CompetitionFinishedSubscriber implements EventSubscriberInterface
{
    /**
     * @var CompetitionService
     */
    private $competitionService;

    /**
     * CompetitionFinishedSubscriber constructor.
     * @param CompetitionService $competitionService
     */
    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents() :array
    {
        return [
            CompetitionFinishedEvent::NAME => "onCompetitionFinished"
        ];
    }

    /**
     * @param CompetitionFinishedEvent $event
     */
    public function onCompetitionFinished(CompetitionFinishedEvent $event)
    {
        $competition = $event->getCompetition();
        $this->competitionService->changeStatus(Competition::STATUS_FINISHED, $competition);
    }
}