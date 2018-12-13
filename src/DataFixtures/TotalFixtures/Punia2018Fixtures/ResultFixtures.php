<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 10.38
 */

namespace App\DataFixtures\TotalFixtures\Punia2018Fixtures;



use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    private $results = [
        '1' =>
            [
                "Mindaugas Mikniunas" => [],
                "Vitalijus Grizas" => [5.376],
                "Saulius Jezukevicius" => [14.125, 7.5, 5.75],
                "Lukas Buivydas" => [8.575],
                "Lukas Stancelis" => [5.325],
                "Darius Peza" => [5.525, 10.15, 9.175, 9.475, 4.45],
                "Paulius Banionis" => []
            ],
        '2' =>
            [
                "Mindaugas Mikniunas"  => [],
                "Vitalijus Grizas" => [5.55],
                "Saulius Jezukevicius" => [8.55, 7.7,10.625, 8.575],
                "Lukas Buivydas" => [23.375],
                "Lukas Stancelis" => [],
                "Darius Peza" => [8,8.325, 6.15, 8, 7.1, 9.05, 8.175],
                "Paulius Banionis" => []
            ],
        '3' =>
            [
                "Mindaugas Mikniunas"  => [],
                "Vitalijus Grizas" => [6.775],
                "Saulius Jezukevicius" => [5.475, 8.15, 7.025, 12.15],
                "Lukas Buivydas" => [14.05],
                "Lukas Stancelis" => [],
                "Darius Peza" => [14.025, 13.075, 10.425, 8.65],
                "Paulius Banionis" => []
            ],
        '4' => [
            "Mindaugas Mikniunas"  => [],
            "Vitalijus Grizas" => [],
            "Saulius Jezukevicius" => [7.825, 14.725, 10.6],
            "Lukas Buivydas" => [],
            "Lukas Stancelis" => [10.8,
                7.375],
            "Darius Peza" => [12.075, 14.825, 10.35, 6.375, 12.025],
            "Paulius Banionis" => []
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