<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.4
 * Time: 01.12
 */

namespace App\Entity;


class ResultsForm
{
    protected $sectorId;
    protected $result;

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

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }


}