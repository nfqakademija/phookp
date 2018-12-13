<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.12
 * Time: 22.53
 */

namespace App\Services\ResultCalculation;


class ResultsDifferenceService
{
    public function calculateDifference(array $resultsArray): array
    {
        for($i = 1; $i < count($resultsArray); $i++)
        {
            $resultsArray[$i]['totalDifference'] = $resultsArray[$i-1]["totalWeigh"] - $resultsArray[$i]["totalWeigh"];
        }

        return $resultsArray;
    }
}