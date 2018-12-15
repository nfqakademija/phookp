<?php

namespace App\DataFixtures\TotalFixtures\Pykaiciai2018Fixtures;

use App\Entity\Result;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResultFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $team1 = $this->getReference("Usas Team");
        $team2 = $this->getReference("Iron Team");
        $team3 = $this->getReference("Naujakuriai");
        $team4 = $this->getReference("Monster Carp Team");
        $team5 = $this->getReference("Judex_1");
        $team6 = $this->getReference("Common Carp Team");
        $team7 = $this->getReference("Test DRIVE");
        $team8 = $this->getReference("Carp Masters");
        $team9 = $this->getReference("M&D carp team");
        $team10 = $this->getReference("Autsaideriai");
        $team11 = $this->getReference("PopUp");
        $team12 = $this->getReference("EXSTO NT");
        $team13 = $this->getReference("LineBrakers");
        $team14 = $this->getReference("AndJust1");
        $team15 = $this->getReference("3 1/4 Team_1");


        $weighing1 = $this->getReference("weighing1");
        $weighing2 = $this->getReference("weighing2");
        $weighing3 = $this->getReference("weighing3");
        $weighing4 = $this->getReference("weighing4");

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(7050);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(5650);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(6525);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(7450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(5700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(4125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing1);
        $result->setWeigh(4925);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(6375);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(7125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(5200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(5675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(5775);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(4750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(9500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(6100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing2);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(8925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(6125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(4925);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing3);
        $result->setWeigh(8525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(6000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(7850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(10100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(3125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(4500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(5800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(9150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(4275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team10);
        $result->setWeighing($weighing4);
        $result->setWeigh(9425);
        $result->setSpecialFish(1);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(5825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(7550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(7950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(4600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(7500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(4325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(6225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(8400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(8000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(5375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing1);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(4800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(6625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(7225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(5350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(4925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(5150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(6025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(4225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(4800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(9300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(6550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing2);
        $result->setWeigh(7875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(5250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(5450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(7575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(9975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(6675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(4425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(5350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(8625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(6325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(10150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing3);
        $result->setWeigh(7100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(3750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(6750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(8450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(7000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(6025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(7300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(8825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team7);
        $result->setWeighing($weighing4);
        $result->setWeigh(4075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing1);
        $result->setWeigh(4590);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing1);
        $result->setWeigh(5950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing1);
        $result->setWeigh(6750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing1);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing1);
        $result->setWeigh(4975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing1);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing2);
        $result->setWeigh(5250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing2);
        $result->setWeigh(5700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing2);
        $result->setWeigh(5125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing2);
        $result->setWeigh(4675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing2);
        $result->setWeigh(7225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing2);
        $result->setWeigh(8700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing3);
        $result->setWeigh(9350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing3);
        $result->setWeigh(6950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing3);
        $result->setWeigh(5275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing3);
        $result->setWeigh(7500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing3);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing3);
        $result->setWeigh(5225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(8575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(3560);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(7700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(5175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(5875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(7800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team11);
        $result->setWeighing($weighing4);
        $result->setWeigh(6700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing1);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing1);
        $result->setWeigh(7175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing1);
        $result->setWeigh(5475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing1);
        $result->setWeigh(6325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing1);
        $result->setWeigh(4800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing2);
        $result->setWeigh(6025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing2);
        $result->setWeigh(5650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing2);
        $result->setWeigh(5875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing2);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing3);
        $result->setWeigh(3800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing3);
        $result->setWeigh(5575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing3);
        $result->setWeigh(5175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing3);
        $result->setWeigh(6575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing3);
        $result->setWeigh(7950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing4);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing4);
        $result->setWeigh(4250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing4);
        $result->setWeigh(8375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing4);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team14);
        $result->setWeighing($weighing4);
        $result->setWeigh(5250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(8825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(9300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(4720);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(7550);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $manager->flush();

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(11425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(6050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(8200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(10425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(5950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(7250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(5575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing1);
        $result->setWeigh(6600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(7800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(6975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(11075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(6125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(8315);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(5400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(4325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(6350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(8325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing2);
        $result->setWeigh(5800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(14700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(8265);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(6800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(8800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(7750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(4850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(6150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(5900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(3925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(6350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(4425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing3);
        $result->setWeigh(10475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(6550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(8300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(5675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(6075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(6650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(5050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(6175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(6100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(8925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(9050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(10050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(6750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team5);
        $result->setWeighing($weighing4);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(7200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(7395);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(8075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(10925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(4600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(7375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(7005);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(5800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(10925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(4600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(8675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(6075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(8250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(6950);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing1);
        $result->setWeigh(10025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(6925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(11175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(4525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(8400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(4375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(5850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(10625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(7375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(8450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing2);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(4325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(3625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(8100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(4200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(7250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(7400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(7100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(4875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(4300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(6650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(5400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(4850);
        $result->setSpecialFish(0);
        $manager->persist($result);
        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing3);
        $result->setWeigh(11000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(5650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(7800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(9125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(9675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(7950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(4575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(7300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(7400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(8700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(6575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(9425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team4);
        $result->setWeighing($weighing4);
        $result->setWeigh(10475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(7525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(6650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(8975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(7075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(4925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(7850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(6575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(5300);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(7425);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(7975);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(4600);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(6800);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(8250);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(6425);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(4000);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing1);
        $result->setWeigh(5075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(8825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(8775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(7275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(6925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(7375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(1525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(6875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(9050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(3700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(9450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(6000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(6500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(5075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(8100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(7825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing2);
        $result->setWeigh(6800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(7000);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(4425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(4675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(6550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(5300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(5050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(5400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(6200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing3);
        $result->setWeigh(10250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(4850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(6025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(10675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(6125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(9300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(7800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(6275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(8700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(4700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(6950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(9725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(5850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(7975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team3);
        $result->setWeighing($weighing4);
        $result->setWeigh(8150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(11150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(9825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(8050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(7650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(7000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(5500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing1);
        $result->setWeigh(7425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(9525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(7225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(5675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(4125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(9600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(6325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(7700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(10925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing2);
        $result->setWeigh(5700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing3);
        $result->setWeigh(6850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing3);
        $result->setWeigh(6750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing3);
        $result->setWeigh(9075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing3);
        $result->setWeigh(6650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing3);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing3);
        $result->setWeigh(10800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(11425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(8300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(11550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(6050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(5000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(9950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(4975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team8);
        $result->setWeighing($weighing4);
        $result->setWeigh(6050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing1);
        $result->setWeigh(10250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing1);
        $result->setWeigh(6850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing1);
        $result->setWeigh(5500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing1);
        $result->setWeigh(7075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing1);
        $result->setWeigh(6075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing2);
        $result->setWeigh(5125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing2);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing2);
        $result->setWeigh(8150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing2);
        $result->setWeigh(6050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing2);
        $result->setWeigh(7850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing3);
        $result->setWeigh(8075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing3);
        $result->setWeigh(5950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing3);
        $result->setWeigh(5300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing3);
        $result->setWeigh(6225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing3);
        $result->setWeigh(3850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing4);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing4);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing4);
        $result->setWeigh(6425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing4);
        $result->setWeigh(6225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team12);
        $result->setWeighing($weighing4);
        $result->setWeigh(11500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(6350);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4925);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(5150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4075);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(7850);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(7850);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4975);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(5050);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(5200);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(6925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4050);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(6475);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(5950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(5175);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(5350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing1);
        $result->setWeigh(6175);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(4350);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(8850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(7925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(4300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(4925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(7075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(3050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(6475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(4025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing2);
        $result->setWeigh(6175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(6150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(10450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(8275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(6675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(6450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(7725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(4800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(5050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing3);
        $result->setWeigh(8050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(10500);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(4525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(4300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(4750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(7300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(5625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(6225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(8350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(8075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(4975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(6125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(3300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team6);
        $result->setWeighing($weighing4);
        $result->setWeigh(5950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(7850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(4700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(6225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(10100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(7175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(5300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(5825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(6450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing1);
        $result->setWeigh(7225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(8025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(4425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(7225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(4625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(6725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(5750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(4200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(9325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing2);
        $result->setWeigh(4900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(6850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(5400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(5225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(5450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(6450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(5225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing3);
        $result->setWeigh(7425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(9650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(5175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(7100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(5750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(7925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(7750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team9);
        $result->setWeighing($weighing4);
        $result->setWeigh(8175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(6450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(6150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(7300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(6500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing1);
        $result->setWeigh(7350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing2);
        $result->setWeigh(7700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing2);
        $result->setWeigh(7200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing2);
        $result->setWeigh(4900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing2);
        $result->setWeigh(7450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing3);
        $result->setWeigh(3500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing3);
        $result->setWeigh(4150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing3);
        $result->setWeigh(6950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing3);
        $result->setWeigh(4450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing3);
        $result->setWeigh(7750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing4);
        $result->setWeigh(5050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing4);
        $result->setWeigh(5400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing4);
        $result->setWeigh(4525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing4);
        $result->setWeigh(5325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing4);
        $result->setWeigh(6025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team13);
        $result->setWeighing($weighing4);
        $result->setWeigh(8325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(8150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(8100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(5200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(7275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(5000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(4950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(6300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(4475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(5500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing1);
        $result->setWeigh(4425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(4900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(6275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(4125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(6275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(6825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(6000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(6525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(2525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(8850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(4725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(5625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(5650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing2);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(5450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(9000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(6050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(9650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(5475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(3800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(7300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(4000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(6000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(5925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(4400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(4975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing3);
        $result->setWeigh(7450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(4775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(5375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(6500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(4650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(9800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(3250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(7650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(7725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(4275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(8725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(10800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(6225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(7725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(5350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(4100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(12025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(4375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(5625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(7475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(11675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team15);
        $result->setWeighing($weighing4);
        $result->setWeigh(7700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(6475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(11025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(10150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(4800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(6075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(7775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(4075);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(4275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(3900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(9000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(3825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(7425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(6500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(4550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(6575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing1);
        $result->setWeigh(5475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(8150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(3250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(9250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(4600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(4275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(5850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(6675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(5475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing2);
        $result->setWeigh(5375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(4575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(6875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(5900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(7625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(7575);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(11375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(7500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(4200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(5000);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(7175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(7675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(7925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(4600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(3675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(11775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing3);
        $result->setWeigh(10550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(8050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(9675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(10475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(8800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5050);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(7500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(4300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(4350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(7450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(4650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(7000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(3650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(4750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(10500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(3550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(8500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(3975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(4925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(4300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6275);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(6650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(7150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team2);
        $result->setWeighing($weighing4);
        $result->setWeigh(5750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(6400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(4625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(7100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(4950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(4150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(6175);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(6475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5675);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(7025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(8000);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(6850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(8425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(4725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(6300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(4900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(5700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(4650);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing1);
        $result->setWeigh(6350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(8125);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5425);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6800);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6550);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5825);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4475);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(3025);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5925);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6250);
        $result->setSpecialFish(0);
        $manager->persist($result);


        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4850);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(4700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(7975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(6450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(10975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(7600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing2);
        $result->setWeigh(5600);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(6925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(10450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(6250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5625);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4475);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4450);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(6975);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(7700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(7725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4725);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(7150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(11375);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(3950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(5825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing3);
        $result->setWeigh(4250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4950);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6400);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4200);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(7525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(7350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(10325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(5875);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(3250);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(5825);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(5150);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(7300);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6900);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(5700);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(10925);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(5325);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4225);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6100);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6500);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6525);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6750);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(6350);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(5775);
        $result->setSpecialFish(0);
        $manager->persist($result);

        $result = new Result();
        $result->setTeam($team1);
        $result->setWeighing($weighing4);
        $result->setWeigh(4000);
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
