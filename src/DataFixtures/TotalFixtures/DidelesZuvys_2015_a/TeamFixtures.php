<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_a;

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
        $team->setTeamName("Wild carp");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Aurimas Katkevičius");
        $team->setSecondTeamMember("Artūras Baronaitis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Carp hunters 2");
        $team->setSectorNr(2);
        $team->setFirstTeamMember("Valdas Bakanas"	);
        $team->setSecondTeamMember("Evaldas Šimkus");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Reflex carp");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Ruslanas Čapkovskis"	);
        $team->setSecondTeamMember("Leonidas Riabcevas");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Rerija");
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Linas Vichrovas"	);
        $team->setSecondTeamMember("Tomas Šiugždinis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Siprak");
        $team->setSectorNr(5);
        $team->setFirstTeamMember("Giedrius Jasulaitis"	);
        $team->setSecondTeamMember("Raimundas Liudvinavičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Pop up");
        $team->setSectorNr(6);
        $team->setFirstTeamMember("Aldas Stepanauskas"	);
        $team->setSecondTeamMember("Mindaugas Januševičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Žvejokliai");
        $team->setSectorNr(8);
        $team->setFirstTeamMember("Vaidas Galkauskas"	);
        $team->setSecondTeamMember("Artūras Murauskas");
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
