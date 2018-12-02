<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 18.36
 */

namespace App\Event;


use App\Entity\Competition;
use Symfony\Component\EventDispatcher\Event;

class CompetitionEvent extends Event
{
    /**
     * @var Competition
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