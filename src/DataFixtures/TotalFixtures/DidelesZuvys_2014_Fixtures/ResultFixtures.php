<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 14.48
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014_Fixtures;


use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    private $results = [
        '1' =>
            [
                "Rerija" => [],
                "Aukštaskraidžiai- Deepex" => [],
                "Carp Hunters" => [13.425],
                "Rolando Žeimio sporto klubas" => [],
                "Anglers" => [8, 8, 8.8],
                "Pop up" => [],
                "Degučiai" => [12.15]
            ],
        '2' =>
            [
                "Rerija" => [13.55],
                "Aukštaskraidžiai- Deepex" => [7.075],
                "Carp Hunters" => [],
                "Rolando Žeimio sporto klubas" => [],
                "Anglers" => [10, 7.5, 12, 8],
                "Pop up" => [],
                "Degučiai" => [8.75]
            ],
        '3' =>
            [
                "Rerija" => [8, 9.4, 10, 5, 12, 15, 14, 4 ],
                "Aukštaskraidžiai- Deepex" => [13.6],
                "Carp Hunters" => [9.05, 9.05, 9.05],
                "Rolando Žeimio sporto klubas" => [7.77, 7.77, 7.77, 7.77, 7.77],
                "Anglers" => [],
                "Pop up" => [9, 10, 9.075],
                "Degučiai" => []
            ],
        '4' =>
            [
                "Rerija" => [11, 9, 8, 8, 9,7.925 ],
                "Aukštaskraidžiai- Deepex" => [],
                "Carp Hunters" => [12, 14.275, 10],
                "Rolando Žeimio sporto klubas" => [7.77, 7.77, 7.77, 7.78, 16.345],
                "Anglers" => [],
                "Pop up" => [8, 5.3],
                "Degučiai" => []
            ],
        '5' =>
            [
                "Rerija" => [7.025, 10, 10, 10, 10],
                "Aukštaskraidžiai- Deepex" => [],
                "Carp Hunters" => [9, 5.225, 10, 10],
                "Rolando Žeimio sporto klubas" => [6, 6.625],
                "Anglers" => [9.3, 9.3, 9.3, 9.3],
                "Pop up" => [20.3, 5, 10, 9.7, 10, 10, 10],
                "Degučiai" => []
            ],
        '6' =>
            [
                "Rerija" => [10, 10.53],
                "Aukštaskraidžiai- Deepex" => [],
                "Carp Hunters" => [12.335, 12.335, 12.335, 12.335, 12.435],
                "Rolando Žeimio sporto klubas" => [10, 8, 4.2, 9, 7.005, 7.005, 7.005],
                "Anglers" => [10, 7.435, 10, 10],
                "Pop up" => [17, 10, 10, 10, 10, 10, 10, 10.53],
                "Degučiai" => []
            ],
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
