<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 00.59
 */

namespace App\Event;


use App\Entity\Competition;
use App\Services\CompetitionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CompetitionConfirmedSubscriber implements EventSubscriberInterface
{
    private $competitionService;

    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService=$competitionService;
    }

    public static function getSubscribedEvents()
    {
        return [
            CompetitionConfirmedEvent::NAME => "onCompetitionConfirmed"
        ];
    }
    public function onCompetitionConfirmed(CompetitionConfirmedEvent $event){
        $competition=$event->getCompetition();
        $status="confirmed";
        $this->competitionService->changeStatus($status,$competition);
    }
}