<?php

namespace App\DataFixtures;

use App\Entity\Competition;
use App\Services\FixtureService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompetitionFixtures extends Fixture
{
    public const COMPETITION_REFERENCE = "competition";


    public function load(ObjectManager $manager)
    {

        $competition = new Competition();
        $competition->setCompetitionName("Didelėsžuvys.lt-2015 finalas");
        $competition->setCompetitionDate(new \DateTime("2015-08-14"));
        $competition->setCompetitionDuration(3);

        $competition->setCompetitionOrganiser("Didelėsžuvys.lt");
        $competition->setCompetitionOrganiserEmail("info@dideleszuvys.lt");
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
