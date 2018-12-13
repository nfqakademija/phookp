<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_a;
use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    private $results = [
        '1' =>
            [
                "Wild carp" => [8.325],
                "Carp hunters 2" => [],
                "Reflex carp" => [],
                "Rerija" => [13.85],
                "Siprak" => [],
                "Pop up" => [8.5],
                "Žvejokliai" => []
            ],
        '2' =>
            [
                "Wild carp" => [14.1,
                    14.575,
                    7.575,
                    7.7],
                "Carp hunters 2" => [9.15,
                    12.4,
                    13.5],
                "Reflex carp" => [9.65,
                    10.225,
                    13.975,
                    8.375,
                    10.625,
                    16.9],
                "Rerija" => [7.5,
                    21.75,
                    9.775,
                    8.2,
                    7.175,
                    12.58,
                ],
                "Siprak" => [9.85,
                    8,
                    9.675,
                    11.85,
                    14.575],
                "Pop up" => [6.55,
                    6.05,
                    8.4,
                    8.125,
                    10.685,
                    6.275,
                    9.55,
                    15.225,
                    10.65,
                    8.675],
                "Žvejokliai" => [15.2,
                    9.175,
                    13.375,
                    14.325,
                    12.225,
                    10.925]
            ],
        '3' =>
            [
                "Wild carp" => [10.3,
                                6.325,
                                   6.85,
                            17.025],
                "Carp hunters 2" => [11.75,
                                    8.175,
                                    7.3],
                "Reflex carp" => [11.5,
                    17.175,
                    8.575,
                    6.325],
                "Rerija" => [12.425,
                    13.2,
                    6.425,
                    7.525],
                "Siprak" => [7.375,
                    8.95,
                    10.55,
                    9.65,
                    14.975,
                    13.825,
                    9.9,
                    10.625,
                    8.225,
                    9.325,
                    10.675],
                "Pop up" => [8.2,
                    11.4,
                    5.175,
                    11.325,
                    7.8,
                    6.45],
                "Žvejokliai" => [9.775,
                    6.8,
                    11.375,
                    11.675,
                    13.95]
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
