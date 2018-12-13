<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 12.21
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014Fixtures;



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
        $weighing->setWeighingTime(new \DateTime("2014-08-21"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(2);
        $weighing->setWeighingTime(new \DateTime("2014-08-22"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(3);
        $weighing->setWeighingTime(new \DateTime("2014-08-22"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(4);
        $weighing->setWeighingTime(new \DateTime("2014-08-22"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(5);
        $weighing->setWeighingTime(new \DateTime("2014-08-23"));
        $manager->persist($weighing);

        $weighing = new Weighing();
        $weighing->setCompetition($competition);
        $weighing->setWeighingNr(6);
        $weighing->setWeighingTime(new \DateTime("2014-08-23"));
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
