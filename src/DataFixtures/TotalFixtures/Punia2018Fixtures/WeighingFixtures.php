<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 10.42
 */

namespace App\DataFixtures\TotalFixtures\Punia2018Fixtures;

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
        $weighing->setWeighingTime(new \DateTime("2018-05-04"));
        $manager->persist($weighing);
        $this->AddReference("weighing-".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(2);
        $weighing->setWeighingTime(new \DateTime("2018-05-05"));
        $manager->persist($weighing);
        $this->AddReference("weighing-".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(3);
        $weighing->setWeighingTime(new \DateTime("2018-05-05"));
        $manager->persist($weighing);
        $this->AddReference("weighing-".$weighing->getWeighingNr(), $weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(4);
        $weighing->setWeighingTime(new \DateTime("2018-05-06"));
        $manager->persist($weighing);
        $this->AddReference("weighing-".$weighing->getWeighingNr(), $weighing);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}