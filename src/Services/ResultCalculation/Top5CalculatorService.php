<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.4
 * Time: 07.13
 */

namespace App\Services\ResultCalculation;


use App\Entity\Team;
use App\Repository\ResultRepository;
use Doctrine\Common\Collections\Collection;

class Top5CalculatorService extends AbstractResultsCalculatorService
{

    private $resultRepository;

    /**
     * Top5CalculatorService constructor.
     * @param $resultRepository
     */
    public function __construct(ResultRepository $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }


    public function getTeamsResults(Collection $teams)
    {
        $teamsArray = array();

        foreach($teams as $team){
            $teamsArray[] = $this->teamResults($team);
        }
        return $this->sortTeamsByTotalWeigh($teamsArray);
    }

    private function teamResults(Team $team): array
    {
        $top5 = $this->resultRepository->findTeamTopFishes($team->getId());

        return array(
            'team' => $team,
            'top5' => $top5,
            'totalWeigh' => $this->totalWeigh($top5),
            'totalCount' => count($team->getResults())
        );
    }

    private function totalWeigh(Collection $results): int
    {
        $total = 0;
        foreach($results as $result)
            $total += $result->getWeigh();

        return $total;
    }
}