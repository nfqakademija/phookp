<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.2
 * Time: 02.52
 */

namespace App\Services;


use App\Entity\Event;
use App\Interfaces\IEventRepository;

final class EventService
{
    private $eventRepository;

    public function __construct(IEventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function create():?string
    {


        $event = new Event();
        $event->setEventType("top5");
        $event->setEventOrganiserEmail("mantas@carpro.lt");
        $event->setEventOrganiser("Mantas ir CO");
        $event->setEventDate(new \DateTime("2018-11-03"));
        $event->setEventName("Paskutinis sansas...");
        $this->eventRepository->save($event);

        return "Naujo evento ID: ".$event->getIdEvent();
    }
}