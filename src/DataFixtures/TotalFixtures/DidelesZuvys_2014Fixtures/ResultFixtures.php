<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 12.21
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014Fixtures;


use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    private $results = [
        '1' =>
            [
                "Rerija" => [15, 12.725],
                "Aukštaskraidžiai" => [10.2],
                "Carp Hunters" => [8.5],
                "Rolando Žeimio sporto klubas" => [],
                "Alex baits" => [],
                "Pop up" => [9.25],
                "Judex" => [12, 10.225]
            ],
        '2' =>
            [
                "Rerija" => [12.225],
                "Aukštaskraidžiai" => [6.075],
                "Carp Hunters" => [],
                "Rolando Žeimio sporto klubas" => [],
                "Alex baits" => [10.6],
                "Pop up" => [8, 7.75, 10],
                "Judex" => [11.125, 14, 8, 10.5, 11.5]
            ],
        '3' =>
            [
                "Rerija" => [],
                "Aukštaskraidžiai" => [12.8, 9.05, 5, 6],
                "Carp Hunters" => [7],
                "Rolando Žeimio sporto klubas" => [10.2],
                "Alex baits" => [7.4],
                "Pop up" => [],
                "Judex" => [9.1]
            ],
        '4' =>
            [
                "Rerija" => [9.925, 9.925],
                "Aukštaskraidžiai" => [6, 8, 9],
                "Carp Hunters" => [9.425, 11],
                "Rolando Žeimio sporto klubas" => [10, 5, 8.1],
                "Alex baits" => [9.125],
                "Pop up" => [11, 9.325],
                "Judex" => [15, 7, 6, 8, 14, 15, 14.9]
            ],
        '5' =>
            [
                "Rerija" => [12, 8.175],
                "Aukštaskraidžiai" => [21.825, 8, 7.375],
                "Carp Hunters" => [],
                "Rolando Žeimio sporto klubas" => [],
                "Alex baits" => [8.5],
                "Pop up" => [10, 9, 9.225],
                "Judex" => [12, 6.825, 16, 14]
            ],
        '6' =>
            [
                "Rerija" => [6.725],
                "Aukštaskraidžiai" => [15, 7.05, 12, 8, 6, 8, 6],
                "Carp Hunters" => [11.8, 5.5, 11.5, 11],
                "Rolando Žeimio sporto klubas" => [6, 5.5, 9.975],
                "Alex baits" => [10.35, 8, 12],
                "Pop up" => [6.9],
                "Judex" => []
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
