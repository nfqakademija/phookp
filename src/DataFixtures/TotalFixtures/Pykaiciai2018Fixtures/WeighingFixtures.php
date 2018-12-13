<?php

namespace App\DataFixtures\TotalFixtures\Pykaiciai2018Fixtures;

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
        $weighing->setWeighingTime(new \DateTime("2018-08-02"));
        $manager->persist($weighing);
        $this->AddReference("weighing".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(2);
        $weighing->setWeighingTime(new \DateTime("2018-08-02"));
        $manager->persist($weighing);
        $this->AddReference("weighing".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(3);
        $weighing->setWeighingTime(new \DateTime("2018-08-03"));
        $manager->persist($weighing);
        $this->AddReference("weighing".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(4);
        $weighing->setWeighingTime(new \DateTime("2018-08-04"));
        $manager->persist($weighing);
        $this->AddReference("weighing".$weighing->getWeighingNr(), $weighing);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}
