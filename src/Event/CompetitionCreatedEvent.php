<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.24
 * Time: 11.38
 */

namespace App\Event;

use App\Entity\Competition;
use Symfony\Component\EventDispatcher\Event;

class CompetitionCreatedEvent extends Event
{
    const NAME = "competition.created";
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