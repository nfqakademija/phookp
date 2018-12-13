<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.3
 * Time: 03.21
 */

namespace App\Services;

use App\Entity\Competition;
use App\Services\ResultCalculation\ResultCalculationInterface;
use App\Services\ResultCalculation\Top5CalculatorService;
use App\Services\ResultCalculation\TotalCalculatorService;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ServiceSubscriberInterface;

class ResultsCalculationService implements ServiceSubscriberInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getResults(Competition $competition): array
    {
        $results = $this->getCalculationService($competition)->calculateResults($competition->getTeams());
        return $results;
    }


    private function getCalculationService(Competition $competition): ResultCalculationInterface
    {
        return $this->container->get($competition->getCompetitionType());
    }

    public static function getSubscribedServices()
    {
        return [
          'total' => TotalCalculatorService::class,
          'top5' => Top5CalculatorService::class
        ];
    }


}