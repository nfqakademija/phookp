<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 12.20
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014Fixtures;


use App\Entity\Hash;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HashFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $hash = new Hash();

        $hash->setHash("219632ee70ff60348df8g6803f0eb854");
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