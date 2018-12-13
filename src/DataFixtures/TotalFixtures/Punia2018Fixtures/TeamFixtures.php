<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 10.38
 */

namespace App\DataFixtures\TotalFixtures\Punia2018Fixtures;


use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TeamFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $competition = $this->getReference(CompetitionFixtures::COMPETITION_REFERENCE);
        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Mindaugas Mikniunas");
        $team->setSectorNr(1);
        $manager->persist($team);
        $this->addReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Vitalijus Grizas");
        $team->setSectorNr(2);
        $manager->persist($team);
        $this->addReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Saulius Jezukevicius");
        $team->setSectorNr(3);
        $manager->persist($team);
        $this->addReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Lukas Buivydas");
        $team->setSectorNr(4);
        $manager->persist($team);
        $this->addReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Lukas Stancelis");
        $team->setSectorNr(5);
        $manager->persist($team);
        $this->addReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Darius Peza");
        $team->setSectorNr(6);
        $manager->persist($team);
        $this->addReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Paulius Banionis");
        $team->setSectorNr(7);
        $manager->persist($team);
        $manager->flush();
        $this->addReference($team->getTeamName(), $team);

    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}