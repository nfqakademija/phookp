<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.3
 * Time: 03.21
 */

namespace App\Services;

use App\Entity\Competition;
use App\Entity\Team;
use App\Repository\ResultRepository;
use Doctrine\Common\Collections\ArrayCollection;

class ResultsCalculationService
{

    private $resultRepository;

    /**
     * ResultsCalculationService constructor.
     * @param $teamRepository
     * @param $competitionRepository
     */
    public function __construct(ResultRepository $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }

    public function competitionTotalResults(Competition $competition): array
    {
        $teams = $competition->getTeams();

        $results = array(
            'teamResults' => $this->getTeamsResults($teams),
            'bigFish' => $this->competitionBigFish($teams),
            'totalWeigh' => $this->calculateCompetitionTotalWeigh($teams),
            'totalCount' => $this->calculateCompetitionTotalCount($teams)
        );

        return $results;
    }

    private function sortTeamsByTotalWeigh(array $teamResults): array
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

    private function getTeamsResults($teams): ?array
    {
        $teamsArray = array();

        foreach($teams as $team){
            $teamsArray[] = $this->teamTotalResults($team);
        }


        return $this->sortTeamsByTotalWeigh($teamsArray);
    }

    private function teamTotalResults(Team $team): ?array
    {
        $resultsArray = array(
            'team' => $team,
            'weighings' => array(

            ),
            'totalWeigh' => $team->totalWeigh(),
            'totalCount' => count($team->getResults())
        );

        $competition = $team->getCompetition();

        foreach($competition->getWeighings() as $weighing)
        {
            $results  = $this->resultRepository->findByTeamAndWeighing($team->getId(), $weighing->getId());
            $weighingResults =  array(
                'weighing' => $weighing,
                'totalWeigh' => $this->calculateWeighingTotalWeigh($results),
                'fishCount' => count($results)
            );

            $resultsArray['weighings'][] = $weighingResults;
        }

        return $resultsArray;
    }

    private function competitionBigFish($teams): array
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

    private function calculateWeighingTotalWeigh($results): int
    {
        $total = 0;
        foreach($results as $r)
        {
            $total += $r->getWeigh();
        }

        return $total;
    }

    private function calculateCompetitionTotalWeigh($teams): int
    {
        $total = 0;
        foreach($teams as $team){
            $total += $team->totalWeigh();
        }
        return $total;
    }

    private function calculateCompetitionTotalCount($teams): int
    {
        $count = 0;

        foreach($teams as $team){
            $count += count($team->getResults());
        }
        return $count;
    }
}