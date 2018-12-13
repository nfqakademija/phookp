<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 10.37
 */

namespace App\DataFixtures\TotalFixtures\Punia2018Fixtures;

use App\Entity\Hash;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HashFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $hash = new Hash();

        $hash->setHash("219632ee70ff60361e803f06959e9854");
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