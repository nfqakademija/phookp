<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.13
 * Time: 12.20
 */

namespace App\DataFixtures\TotalFixtures\DidelesZuvys_2014Fixtures;


use App\Entity\Competition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompetitionFixtures extends Fixture
{
    public const COMPETITION_REFERENCE = "dideleszuvys.lt-2014";

    public function load(ObjectManager $manager)
    {

        $competition = new Competition();
        $competition->setCompetitionName("Didelėsžuvys.lt-2014");
        $competition->setCompetitionDate(new \DateTime("2014-08-21"));
        $competition->setCompetitionDuration(2);
        $competition->setCompetitionLink("");
        $competition->setCompetitionLocation("Didelėsžuvys.lt");
        $competition->setCompetitionOrganiser("Didelėsžuvys.lt");
        $competition->setCompetitionOrganiserEmail("info@didelėszuvys.lt");
        $competition->setCompetitionStatus("finished");
        $competition->setCompetitionLink("https://www.facebook.com/dideleszuvys/photos/a.681680671920890/688905204531770/?type=3&theater");
        $competition->setCompetitionTeamsCount(7);
        $competition->setCompetitionType("total");
        $competition->setCompetitionWeighingsCount(3);
        $competition->setCompetitionApproved(true);

        $manager->persist($competition);
        $manager->flush();

        $this->addReference(self::COMPETITION_REFERENCE, $competition);

    }
}
