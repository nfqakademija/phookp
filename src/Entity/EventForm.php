<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.2
 * Time: 04.25
 */

namespace App\Entity;


class EventForm
{
    const TYPE_TOP = 'typeTopFive';
    const TYPE_BIGGEST = 'typeBiggest';

    protected $eventName;
    protected $email;
    protected $startDate;
    protected $endDate;
    protected $evenType;

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @param mixed $eventName
     */
    public function setEventName($eventName): void
    {
        $this->eventName = $eventName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEventType()
    {
        return $this->evenType;
    }

    /**
     * @param mixed $eventType
     */
    public function setTypeOfEvent($eventType): void
    {
        $this->typeOfEvent = $eventType;
    }
}

