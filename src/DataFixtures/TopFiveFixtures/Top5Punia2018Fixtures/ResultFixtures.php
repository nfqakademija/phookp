<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.12.5
 * Time: 00.04
 */

namespace App\DataFixtures\TopFiveFixtures\Top5Punia2018Fixtures;

use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $team1 = $this->getReference("3 1/4 Team");
        $team2 = $this->getReference("Judex");
        $team3 = $this->getReference("Justeam");
        $team4 = $this->getReference("Cyprinus Carpio Club");
        $team5 = $this->getReference("20+");
        $team6 = $this->getReference("EME Carp Brothers");
        $team7 = $this->getReference("Tinko Broliai");
        $weighing1 = $this->getReference("weighing_1");
        $weighing2 = $this->getReference("weighing_2");
        $weighing3 = $this->getReference("weighing_3");
        $weighing4 = $this->getReference("weighing_4");

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(15550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(14300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(13950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(13450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(8550);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(21125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(17200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(16950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(12750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(11900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(11650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(11550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(11425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(10650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(10175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(10000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(24850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(21550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(16800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(13650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(13525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(12825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(11625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(7700);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(16275);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(8775);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(5875);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(14450);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(12175);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(10125);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(8800);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(6350);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(14000);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(12150);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(10825);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(10100);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(9750);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(9025);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(8625);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(18375);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(17525);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(12275);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(12225);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(11975);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(7075);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();


        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(6575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            WeighingFixtures::class,
            TeamFixtures::class,
        );
    }
}
