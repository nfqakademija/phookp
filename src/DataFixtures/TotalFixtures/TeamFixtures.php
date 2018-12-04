<?php

namespace App\DataFixtures\TotalFixtures;

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
        $team->setSectorNr(13);
        $team->setFirstTeamMember("Darius Pėža");
        $team->setSecondTeamMember(" Rokas Vaitkevičius");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("AndJust1");
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Andrius Senkus"	);
        $team->setSecondTeamMember("Augustas Pučkorius");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("LineBrakers");
        $team->setSectorNr(12);
        $team->setFirstTeamMember("Lukas Buivydas"	);
        $team->setSecondTeamMember("Lukas Stancelis");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Naujakuriai");
        $team->setSectorNr(7);
        $team->setFirstTeamMember("Lebeda Mindaugas"	);
        $team->setSecondTeamMember(" Giedrius Riskevicius");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Judex");
        $team->setSectorNr(5);
        $team->setFirstTeamMember("Gintaras Puzinauskas"	);
        $team->setSecondTeamMember("Rimantas Kicas");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Iron Team");
        $team->setSectorNr(14);
        $team->setFirstTeamMember("Vytautas BU "	);
        $team->setSecondTeamMember("Olegas Ružickis");
        $manager->persist($team);
        $this->setReference($team->getTeamName(), $team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Carp Masters");
        $team->setSectorNr(8);
        $team->setFirstTeamMember("Vytautas Sabasinskas"	);
        $team->setSecondTeamMember("Evaldas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("EXSTO NT");
        $team->setSectorNr(9);
        $team->setFirstTeamMember("Justinas Utaravičius"	);
        $team->setSecondTeamMember("Lukas Seduikis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Common Carp Team ");
        $team->setSectorNr(10);
        $team->setFirstTeamMember("Paulius Matulionis");
        $team->setSecondTeamMember("Edgaras Klimantavičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("M&D carp team");
        $team->setSectorNr(11);
        $team->setFirstTeamMember("Minvydas Bagušinskas");
        $team->setSecondTeamMember(" Deivydas Igoris");
        $manager->persist($team);


        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Usas Team");
        $team->setSectorNr(15);
        $team->setFirstTeamMember("Raimis Ūsas Liudvinavičius");
        $team->setSecondTeamMember(" Arbuzas Kokosas Melionas)");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName(" PopUp");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Aldas Stepanauskas");
        $team->setSecondTeamMember("Karolis Lukosiavicius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Monster Carp Team");
        $team->setSectorNr(6);
        $team->setFirstTeamMember("Mindaugas Mikniunas");
        $team->setSecondTeamMember("Justas Barakauskas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Autsaideriai");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Nerijus Stulginskis");
        $team->setSecondTeamMember("Svajunas Česaitis");
        $manager->persist($team);


        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName(" Test DRIVE");
        $team->setSectorNr(2);
        $team->setFirstTeamMember("Virginijus Virbickas");
        $team->setSecondTeamMember("Mažvydas Aliukonis");
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
