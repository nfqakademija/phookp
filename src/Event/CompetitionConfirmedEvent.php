<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 00.57
 */

namespace App\Event;


use App\Entity\Competition;
use Symfony\Component\EventDispatcher\Event;

class CompetitionConfirmedEvent extends Event
{
    const NAME = "competition.confirmed";
    /**
     * @var Competition $competition
     */
    private $competition;

    /**
     * CompetitionCreatedEvent constructor.
     * @param Competition $competition
     */

    public function __construct(Competition $competition)
    {
        $this->competition = $competition;
    }

    /**
     * @return Competition
     */
    public function getCompetition(): Competition
    {
        return $this->competition;
    }

}