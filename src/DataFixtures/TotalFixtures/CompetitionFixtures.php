<?php

namespace App\DataFixtures\TotalFixtures;

use App\Entity\Competition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompetitionFixtures extends Fixture
{
    public const COMPETITION_REFERENCE = "total";


    public function load(ObjectManager $manager)
    {

        $competition = new Competition();
        $competition->setCompetitionName("Pikts Karpis, Pykaičiai 2018");
        $competition->setCompetitionDate(new \DateTime("2018-08-02"));
        $competition->setCompetitionDuration(3);
        $competition->setCompetitionLink("https://www.facebook.com/events/1181032402028380/?active_tab=about");
        $competition->setCompetitionLocation("Pykaičiai");
        $competition->setCompetitionOrganiser("Pikts Karpis");
        $competition->setCompetitionOrganiserEmail("info@piktsKarpis.lt");
        $competition->setCompetitionStatus("finished");
        $competition->setCompetitionTeamsCount(15);
        $competition->setCompetitionType("total");
        $competition->setCompetitionWeighingsCount(4);
        $competition->setCompetitionApproved(true);

        $manager->persist($competition);
        $manager->flush();

        $this->addReference(self::COMPETITION_REFERENCE, $competition);

    }
}
