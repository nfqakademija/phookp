<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 12.21
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014Fixtures;


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
        $team->setTeamName("Rerija");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Linas Vichrovas");
        $team->setSecondTeamMember("Tomas Šiugždinis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Aukštaskraidžiai");
        $team->setSectorNr(2);
        $team->setFirstTeamMember("Tomas kurmilavičius"	);
        $team->setSecondTeamMember("Paulius Kurmilavičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Carp Hunters");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Aurimas katkevičius"	);
        $team->setSecondTeamMember("Artūras Baronaitis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Rolando Žeimio sporto klubas");
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Rolandas Žeimys");
        $team->setSecondTeamMember("Raimundas Liudvinavičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Alex baits");
        $team->setSectorNr(5);
        $team->setFirstTeamMember("Aurimas Misius");
        $team->setSecondTeamMember("Aleksandr Manoviec");
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
        $team->setTeamName("Judex");
        $team->setSectorNr(7);
        $team->setFirstTeamMember("Rimantas Kičas");
        $team->setSecondTeamMember("Gintaras Puzinauskas");
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