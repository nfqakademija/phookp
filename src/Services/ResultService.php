<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.19
 * Time: 01.19
 */

namespace App\Services;


use App\Entity\Result;
use App\Repository\ResultRepository;
use Doctrine\Common\Collections\Collection;

class ResultService
{
    private $resultRepository;

    /**
     * ResultService constructor.
     * @param $resultRepository
     */
    public function __construct(ResultRepository $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }

    public function persist(Result $result):void
    {
        $this->resultRepository->save($result);
    }

    public function getTeamResults($teamId, $weighingId): Collection
    {
        return $this->resultRepository->findByTeamAndWeighing($teamId, $weighingId);
    }

}