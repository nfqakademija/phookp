<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_final;
use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    private $results = [
        '1' =>
            [
                "Autsaideriai" => [ 11.475],
                "Šoklyderiai" => [ ],
                "Siprak" => [11.2],
                "Judex" => [13.875],
                "Žvejokliai" => [8.9],
                "Pop up" => [8.825],
                "Rerija" => [14.9]
            ],
        '2' =>
            [
                "Autsaideriai" => [ 20.925,
                    13.85,
                    14.95,
                    5.65,
                    7.45],
                "Šoklyderiai" => [ 6.55,
                    11.925],
                "Siprak" => [8,
                    10.5,
                    9.525,
                    12.65,
                    17.925],
                "Judex" => [8.7,
                    11.8,
                    14.2,
                    7.1,
                    7.65],
                "Žvejokliai" => [10.8,
                    7.375],
                "Pop up" => [10.35,
                    9.65,
                    7.375,
                    7.325],
                "Rerija" => [9.625]
            ],
        '3' =>
            [
                "Autsaideriai" => [ 22.075,
                    15.2,
                    15.025,
                    5.175],
                "Šoklyderiai" => [10.925,
                    8.35 ],
                "Siprak" => [11.95,
                    12.075,
                    7.675],
                "Judex" => [14.425,
                    12.5,
                    10.6,
                    9.525,
                    8.725,
                    9.625,
                    13.575,
                    9.775],
                "Žvejokliai" => [8.45,
                    19.3,
                    10.575],
                "Pop up" => [14.325,
                    10.2,
                    6.975,
                    6.95,
                    8.25,
                    8.125,
                    6.325],
                "Rerija" => [7.95]
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
