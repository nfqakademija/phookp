<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_b;

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
        $weighing->setWeighingTime(new \DateTime("2015-08-07"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(2);
        $weighing->setWeighingTime(new \DateTime("2015-08-08"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(3);
        $weighing->setWeighingTime(new \DateTime("2015-08-09"));
        $manager->persist($weighing);


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}
