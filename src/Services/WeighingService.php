<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.19
 * Time: 01.19
 */

namespace App\Services;

use App\Services\ResultService;
use App\Entity\Team;
use App\Entity\Weighing;
use App\Repository\WeighingRepository;


class WeighingService
{
    private $weighingRepository;

    /**
     * WeighingService constructor.
     * @param $weighingRepository
     */
    public function __construct(WeighingRepository $weighingRepository)
    {
        $this->weighingRepository = $weighingRepository;
    }

    public function create(Weighing $w, Team $team, ResultService $resultService): void
    {
        $w->setWeighingTime(new \DateTime("now"));
        foreach($w->getResults() as $r){
            if($r->getWeigh() === null){
                $w->removeResult($r);
                continue;
            }

            $r->setTeam($team);
            $resultService->persist($r);
        }
        $this->weighingRepository->save($w);
        $this->weighingRepository->flush();
    }

}