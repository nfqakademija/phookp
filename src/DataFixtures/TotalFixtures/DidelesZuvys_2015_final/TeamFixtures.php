<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_final;

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
        $team->setTeamName("Autsaideriai");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Mantas Arbačiauskas");
        $team->setSecondTeamMember("Nerijus Stulginskis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Šoklyderiai");
        $team->setSectorNr(2);
        $team->setFirstTeamMember("Edgaras Degutis");
        $team->setSecondTeamMember("Vytautas Degutis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Siprak");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Raimundas Liudvinavičius");
        $team->setSecondTeamMember("Giedrius Jasulaitis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Judex");
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Gintaras Puzinauskas");
        $team->setSecondTeamMember("Rimantas Kičas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Žvejokliai");
        $team->setSectorNr(5);
        $team->setFirstTeamMember("Vaidas Galkauskas");
        $team->setSecondTeamMember("Artūras Murauskas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Pop up");
        $team->setSectorNr(6);
        $team->setFirstTeamMember("Mindaugas Jenuševičius");
        $team->setSecondTeamMember("Aldas Stepanauskas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Rerija");
        $team->setSectorNr(7);
        $team->setFirstTeamMember("Tomas Šiugždinis");
        $team->setSecondTeamMember("Linas Vichrovas");
        $manager->persist($team);

        $manager->flush();


    }

    public function getDependencies()
    {
        return array(
            CompetitionFixtures::class
        );
    }
}
