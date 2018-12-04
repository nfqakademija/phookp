<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.5
 * Time: 00.04
 */

namespace App\DataFixtures\TopFiveFixtures;

use App\Entity\Weighing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class WeighingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $competition = $this->getReference(CompetitionFixtures::COMPETITION_REFERENCE);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(1);
        $weighing->setWeighingTime(new \DateTime("2018-09-13"));
        $manager->persist($weighing);
        $this->setReference("weighing_".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(2);
        $weighing->setWeighingTime(new \DateTime("2018-09-14"));
        $manager->persist($weighing);
        $this->setReference("weighing_".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(3);
        $weighing->setWeighingTime(new \DateTime("2018-09-14"));
        $manager->persist($weighing);
        $this->setReference("weighing_".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(4);
        $weighing->setWeighingTime(new \DateTime("2018-09-15"));
        $manager->persist($weighing);
        $this->setReference("weighing_".$weighing->getWeighingNr(), $weighing);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}
