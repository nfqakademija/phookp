<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.5
 * Time: 00.04
 */

namespace App\DataFixtures\TopFiveFixtures;
use App\Entity\Competition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompetitionFixtures extends Fixture
{
    public const COMPETITION_REFERENCE = "topFive";


    public function load(ObjectManager $manager)
    {
        $competition = new Competition();
        $competition->setCompetitionName("Pikts Karpis - TOP5, Punia 2018");
        $competition->setCompetitionDate(new \DateTime("2018-09-13"));
        $competition->setCompetitionDuration(3);
        $competition->setCompetitionLink("https://www.facebook.com/events/240567726665093/");
        $competition->setCompetitionLocation("Punia");
        $competition->setCompetitionOrganiser("Pikts Karpis");
        $competition->setCompetitionOrganiserEmail("info@piktsKarpis.lt");
        $competition->setCompetitionStatus("finished");
        $competition->setCompetitionTeamsCount(7);
        $competition->setCompetitionType("top5");
        $competition->setCompetitionWeighingsCount(4);
        $competition->setCompetitionApproved(true);

        $manager->persist($competition);
        $manager->flush();
        $this->addReference(self::COMPETITION_REFERENCE, $competition);


    }
}