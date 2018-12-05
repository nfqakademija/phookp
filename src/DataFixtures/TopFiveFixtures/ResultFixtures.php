<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.5
 * Time: 00.04
 */

namespace App\DataFixtures\TopFiveFixtures;

use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $competition = $this->getReference(CompetitionFixtures::COMPETITION_REFERENCE);

        foreach ($competition->getWeighings() as $weighing) {

            foreach ($competition->getTeams() as $team) {
                $r_count = mt_rand(2, 12);

                for ($i = 0; $i < $r_count; $i++) {

                    $result = new Result();
                    $result->setTeam($team);
                    $result->setWeighing($weighing);
                    $result->setWeigh(mt_rand(3000, 20000));
                    $result->setSpecialFish(mt_rand(0, 1));
                    $manager->persist($result);
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
