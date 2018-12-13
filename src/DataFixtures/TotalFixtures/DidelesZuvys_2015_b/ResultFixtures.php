<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_b;
use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    private $results = [
        '1' =>
            [
                "Šoklyderiai" => [ 10.775],
                "Judex" => [ 10.7],
                "UKLKD" => [10.8],
                "Autsaideriai" => [],
                "Pikts karpis" => [],
                "Big fish" => [],
                "Carp hunters" => []
            ],
        '2' =>
            [
                "Šoklyderiai" => [ 6.8,
                    14.45,
                    7.725,
                    11.525],
                "Judex" => [ 6.325,
                    7.95],
                "UKLKD" => [16.575],
                "Autsaideriai" => [],
                "Pikts karpis" => [8,
                    6.175,
                    9.625,
                    6.15],
                "Big fish" => [10.425,
                    13.85],
                "Carp hunters" => [10.4,
                    14.675]
            ],
        '3' =>
            [
                "Šoklyderiai" => [ 12.7],
                "Judex" => [ 11.9,
                    10.05,
                    13.625],
                "UKLKD" => [],
                "Autsaideriai" => [9.9,
                    10.1,
                    10.175,
                    7.1],
                "Pikts karpis" => [],
                "Big fish" => [12.125],
                "Carp hunters" => [8.75]
            ]
    ];

    public function load(ObjectManager $manager)
    {
        $competition = $this->getReference(CompetitionFixtures::COMPETITION_REFERENCE);

        foreach ($competition->getWeighings() as $weighing) {

            foreach ($competition->getTeams() as $team) {

                if($this->results[$weighing->getWeighingNr()][$team->getTeamName()])
                {
                    $rez = $this->results[$weighing->getWeighingNr()][$team->getTeamName()];

                    foreach($rez as $weigh){
                        $result = new Result();
                        $result->setTeam($team);
                        $result->setWeighing($weighing);
                        $result->setWeigh($weigh*1000);
                        $result->setSpecialFish(mt_rand(0, 1));
                        $manager->persist($result);
                    }
                }
            }
        }
        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            WeighingFixtures::class,
            TeamFixtures::class,
        );
    }
}
