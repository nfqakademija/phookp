<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_a;

use App\Entity\Hash;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HashFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $hash = new Hash();

        $hash->setHash("219632ee70ff60348df8g6803f0e9854");
        $hash->setCompetition($this->getReference(CompetitionFixtures::COMPETITION_REFERENCE));

        $manager->persist($hash);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}
