<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 14.48
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014_Fixtures;


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
        $team->setSectorNr(4);
        $team->setFirstTeamMember("Linas Vichrovas");
        $team->setSecondTeamMember("Tomas Šiugždinis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Aukštaskraidžiai- Deepex");
        $team->setSectorNr(1);
        $team->setFirstTeamMember("Tomas kurmilavičius"	);
        $team->setSecondTeamMember("Paulius Kurmilavičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Carp Hunters");
        $team->setSectorNr(2);
        $team->setFirstTeamMember("Aurimas katkevičius"	);
        $team->setSecondTeamMember("Artūras Baronaitis");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Rolando Žeimio sporto klubas");
        $team->setSectorNr(7);
        $team->setFirstTeamMember("Rolandas Žeimys");
        $team->setSecondTeamMember("Raimundas Liudvinavičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Anglers");
        $team->setSectorNr(6);
        $team->setFirstTeamMember(" ");
        $team->setSecondTeamMember(" ");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Pop up");
        $team->setSectorNr(3);
        $team->setFirstTeamMember("Aldas Stepanauskas"	);
        $team->setSecondTeamMember("Mindaugas Januševičius");
        $manager->persist($team);

        $team = new Team();
        $team->setCompetition($competition);
        $team->setTeamName("Degučiai");
        $team->setSectorNr(5);
        $team->setFirstTeamMember(" ");
        $team->setSecondTeamMember(" ");
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