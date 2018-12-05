<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.5
 * Time: 00.04
 */

namespace App\DataFixtures\TopFiveFixtures;


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
        $team->setTeamName("3 1/4 Team");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Darius Pėža");
        $team->setSecondTeamMember(" Rokas Vaitkevičius");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Justeam");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Justas Barakauskas"	);
        $team->setSecondTeamMember("Justė Knatauskaitė");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("20+");
        $team->setSectorNr(5);
        $team->setFirstTeamMember("Mažvydas Aliukonis"	);
        $team->setSecondTeamMember("Karolis Veličko");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Judex");
        $team->setSectorNr(2);
        $team->setSecondTeamMember("Rimantas Kicas");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Cyprinus Carpio Club");
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Danas Brazauskas"	);
        $team->setSecondTeamMember(" Nerijus Rink");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Tinko Broliai");
        $team->setSectorNr(8);
        $team->setFirstTeamMember("Gintaras Puzinauskas"	);
        $team->setSecondTeamMember("Tomas Grigaravicius");
        $team->setThirdTeamMember("Gintas Grigaravicius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("EME Carp Brothers ");
        $team->setSectorNr(8);
        $team->setFirstTeamMember("Edgaras Ramuckas"	);
        $team->setSecondTeamMember("Mindaugas Tocionis");
        $manager->persist($team);
        $manager->flush();
        $this->setReference($team->getTeamName(), $team);

    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}
