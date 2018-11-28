<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.19
 * Time: 01.19
 */

namespace App\Services;

use App\Entity\Team;
use App\Entity\Weighing;
use App\Repository\ResultRepository;
use App\Repository\WeighingRepository;


class WeighingService
{
    private $weighingRepository;

    private $resultRepository;
    /**
     * WeighingService constructor.
     * @param $weighingRepository
     */
    public function __construct(WeighingRepository $weighingRepository, ResultRepository $resultRepository)
    {
        $this->weighingRepository = $weighingRepository;
        $this->resultRepository = $resultRepository;
    }

    public function create(Weighing $w, Team $team): void
    {
        $w->setWeighingNr($this->nextWeighingNumber($w->getCompetition()->getId()));

        $w->setWeighingTime(new \DateTime("now"));

        $this->removeEmptyResults($w, $team);

        $this->weighingRepository->save($w);
        $this->weighingRepository->flush();
    }

    public function nextWeighingNumber(int $competitionID): int
    {
        $count = $this->weighingRepository->countWeighingsByCompetition($competitionID);

        return $count + 1;
    }

    public function removeEmptyResults(Weighing $w, Team $team): void
    {
        foreach ($w->getResults() as $r) {
            if ($r->getWeigh() === null || $r->getWeigh() === 0) {
                $this->resultRepository->removeResult($r);
                $w->removeResult($r);
                continue;
            }
            if (!$r->getWeighing()) {
                $r->setWeighing($w);
            }
            $r->setTeam($team);

            $this->resultRepository->save($r);
        }
        return;
    }

}