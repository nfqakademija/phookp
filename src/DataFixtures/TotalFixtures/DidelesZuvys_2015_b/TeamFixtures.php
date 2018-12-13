<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_b;
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
        $team->setTeamName("Šoklyderiai");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Edgaras Degutis");
        $team->setSecondTeamMember("Vytautas Degutis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Judex");
        $team->setSectorNr(2);
        $team->setFirstTeamMember("Rimantas Kičas"	);
        $team->setSecondTeamMember("Gintaras Puzinauskas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("UKLKD");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Žydrius Dzemyda"	);
        $team->setSecondTeamMember("Tadas Nutautas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Autsaideriai");
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Mantas Arbačiauskas"	);
        $team->setSecondTeamMember("Nerijus Stulginskis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Pikts karpis");
        $team->setSectorNr(5);
        $team->setFirstTeamMember("Linas Kukulskis"	);
        $team->setSecondTeamMember("Jolita Steponkevičiūtė");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Big fish");
        $team->setSectorNr(6);
        $team->setFirstTeamMember("Evaldas Mačiulaitis"	);
        $team->setSecondTeamMember("Mindaugas Sabalas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Carp hunters");
        $team->setSectorNr(7);
        $team->setFirstTeamMember("Rolandas Bagdonavičius"	);
        $team->setSecondTeamMember("Tomas Norkevičius");
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
