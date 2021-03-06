<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.4
 * Time: 06.20
 */

namespace App\Services\ResultCalculation;


use Doctrine\Common\Collections\Collection;

abstract class AbstractResultsCalculatorService implements ResultCalculationInterface
{
    abstract protected function getTeamsResults(Collection $teams);

    public function calculateResults(Collection $teams): array
    {

        $results = array(
            'teamResults' => $this->getTeamsResults($teams),
            'bigFish' => $this->competitionBigFish($teams),
            'totalWeigh' => $this->roundUpWeigh($this->calculateCompetitionTotalWeigh($teams)),
            'totalCount' => $this->calculateCompetitionTotalCount($teams)
        );

        $results['teamResults'] = $this->calculateDifference($results['teamResults']);

        return $results;
    }

    protected function competitionBigFish(Collection $teams): array
    {
        $bigFish = array(
            'team' => null,
            'weigh' => 0
        );

        foreach($teams as $team){
            if($team->findBigFish() > $bigFish['weigh'])
            {
                $bigFish['team'] = $team->getTeamName();
                $bigFish['weigh'] = $team->findBigFish();
            }
        }

        $bigFish['weigh'] = $this->roundUpWeigh($bigFish['weigh']);
        return $bigFish;
    }

    protected function calculateCompetitionTotalWeigh(Collection $teams): int
    {
        $total = 0;
        foreach($teams as $team){
            $total += $team->totalWeigh();
        }
        return $total;
    }

    protected function roundUpWeigh(int $weigh): string
    {
        return number_format((float)($weigh/1000), 3, '.', '');
    }

    protected function calculateCompetitionTotalCount(Collection $teams): int
    {
        $count = 0;

        foreach($teams as $team){
            $count += count($team->getResults());
        }
        return $count;
    }

    protected function sortTeamsByTotalWeigh(array $teamResults): array
    {
        for($i = 0; $i < count($teamResults); $i++){
            for($j = $i+1; $j< count($teamResults); $j++){
                if(floatval($teamResults[$i]['totalWeigh']) < floatval($teamResults[$j]['totalWeigh'])){
                    $temp = $teamResults[$i];
                    $teamResults[$i] = $teamResults[$j];
                    $teamResults[$j] = $temp;
                }
            }
        }

        return $teamResults;
    }

    protected function calculateDifference(array $resultsArray): array
    {
        for($i = 1; $i < count($resultsArray); $i++)
        {
            $resultsArray[$i]['totalDifference'] = $this->roundUpDifference((float)$resultsArray[$i-1]["totalWeigh"] - (float)$resultsArray[$i]["totalWeigh"]);
        }

        return $resultsArray;
    }

    protected function roundUpDifference(float $diff): string
    {
        return number_format((float)($diff), 3, '.', '');
    }
}