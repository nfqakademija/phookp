<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.4
 * Time: 06.04
 */

namespace App\Services\ResultCalculation;


use Doctrine\Common\Collections\Collection;

interface ResultCalculationInterface
{
    public function calculateResults(Collection $teams): array;
}