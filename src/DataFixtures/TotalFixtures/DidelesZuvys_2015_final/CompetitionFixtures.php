<?php

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2015_final;

use App\Entity\Competition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompetitionFixtures extends Fixture
{
    public const COMPETITION_REFERENCE = "dideleszuvys.lt-2015-final";

    public function load(ObjectManager $manager)
    {

        $competition = new Competition();
        $competition->setCompetitionName("\"Didelėsžuvys.lt-2015\" Finalas");
        $competition->setCompetitionDate(new \DateTime("2015-08-14"));
        $competition->setCompetitionDuration(3);
        $competition->setCompetitionLink("");
        $competition->setCompetitionLocation("Didelėsžuvys.lt");
        $competition->setCompetitionOrganiser("Didelėsžuvys.lt");
        $competition->setCompetitionOrganiserEmail("info@didelėszuvys.lt");
        $competition->setCompetitionStatus("finished");
        $competition->setCompetitionTeamsCount(7);
        $competition->setCompetitionType("total");
        $competition->setCompetitionWeighingsCount(3);
        $competition->setCompetitionApproved(true);

        $manager->persist($competition);
        $manager->flush();

        $this->addReference(self::COMPETITION_REFERENCE, $competition);

    }
}
