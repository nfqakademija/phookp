<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_b;

use App\Entity\Hash;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HashFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $hash = new Hash();

        $hash->setHash("219632e39kkd0ff48df8g6803f0e9854");
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
