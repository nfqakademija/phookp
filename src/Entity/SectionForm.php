<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.4
 * Time: 13.08
 */

namespace App\Entity;


class SectionForm
{
    protected $sectorId=array(null, null, null);

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