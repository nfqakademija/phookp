<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.4
 * Time: 06.35
 */

namespace App\Services\ResultCalculation;

use App\Entity\Team;
use App\Entity\Weighing;
use App\Repository\ResultRepository;
use Doctrine\Common\Collections\Collection;


class TotalCalculatorService extends AbstractResultsCalculatorService
{


    private $resultRepository;

    /**
     * TotalCalculatorService constructor.
     * @param $resultRepository
     */
    public function __construct(ResultRepository $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }


    protected function getTeamsResults(Collection $teams): array
    {
        $teamsArray = array();

        foreach($teams as $team){
            $teamsArray[] = $this->teamResults($team);
        }


        return $this->sortTeamsByTotalWeigh($teamsArray);
    }

    private function teamResults(Team $team): array
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
            $resultsArray['weighings'][] = $this->formatWeighingResult($weighing, $team);
        }

        return $resultsArray;
    }

    private function formatWeighingResult(Weighing $weighing, Team $team):array
    {
        $results  = $this->resultRepository->findByTeamAndWeighing($team->getId(), $weighing->getId());

        return array(
            'weighing' => $weighing,
            'totalWeigh' => $this->calculateWeighingTotalWeigh($results),
            'fishCount' => count($results)
        );
    }

    private function calculateWeighingTotalWeigh(Collection $results): int
    {
        $total = 0;
        foreach($results as $r)
        {
            $total += $r->getWeigh();
        }

        return $total;
    }
}