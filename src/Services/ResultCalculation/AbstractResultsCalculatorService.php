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
            'totalWeigh' => $this->calculateCompetitionTotalWeigh($teams),
            'totalCount' => $this->calculateCompetitionTotalCount($teams)
        );

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
                if($teamResults[$i]['totalWeigh'] < $teamResults[$j]['totalWeigh']){
                    $temp = $teamResults[$i];
                    $teamResults[$i] = $teamResults[$j];
                    $teamResults[$j] = $temp;
                }
            }
        }

        return $teamResults;
    }
}