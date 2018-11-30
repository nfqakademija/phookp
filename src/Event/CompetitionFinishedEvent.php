<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.30
 * Time: 13.59
 */

namespace App\Event;


class CompetitionFinishedEvent extends CompetitionEvent
{
    const NAME = "competition.finished";
}