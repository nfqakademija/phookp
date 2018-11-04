<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.10.31
 * Time: 22.17
 */

namespace App\Entity;


class CommandForm
{
    protected $commandName;
    protected $commandEmail;



    /**
     * @return mixed
     */
    public function getCommandName()
    {
        return $this->commandName;
    }

    /**
     * @param mixed $commandName
     */
    public function setCommandName($commandName): void
    {
        $this->commandName = $commandName;
    }

    /**
     * @return mixed
     */
    public function getCommandEmail()
    {
        return $this->commandEmail;
    }

    /**
     * @param mixed $commandEmail
     */
    public function setCommandEmail($commandEmail): void
    {
        $this->commandEmail = $commandEmail;
    }

    /**
     * @return mixed
     */
    public function getSectorId()
    {
        return $this->sectorId;
    }

    /**
     * @param mixed $sectorId
     */
    public function setSectorId($sectorId): void
    {
        $this->sectorId = $sectorId;
    }



}