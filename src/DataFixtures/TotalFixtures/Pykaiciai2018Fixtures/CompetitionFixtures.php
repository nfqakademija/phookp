<?php

namespace App\DataFixtures\TotalFixtures\Pykaiciai2018Fixtures;

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
        $competition->setCompetitionRules("1. Varžomasi komandoje, komandą sudaro du kapininkai, komandą gali lankyti svečiai, tačiau jie negali padėti varžybų dalyviams.
2. Tyrinėti sektorių markeriu, jaukinti žuvį ir masalus mesti į vandenį galima tik nuo varžybų starto pradžios.
3. Žvejoti galima 4-mis įrankiais turinčiais po 1 kablį. Paruoštų įrankių skaičius neribojamas.
4. Markeris naudojamas tik dugno tyrinėjimui ir gylio nustatymui, baigus dugno tyrinėjimą markeris turi būti ištrauktas iš vandens. Markerį naudoti kaip žymeklį draudžiama.
5. Jaukinti ir masalus mesti galima tik iš savo sektoriaus zonos (swim’o) visais būdais, išskyrus valtis ir specialius laivelius.
6. Nuo 19:00 valandos iki 7:00 valandos jaukinti žuvis naudojant triukšmingus jaukinimo įrankius, tokius kaip spomb‘as, raketas, „krabus“ draudžiama.
7. Masalas tvirtinamas prie kabliuko naudojant „plauko sistemą“. Draudžiama naudoti gyvus jaukus ir masalus (musės lervos, sliekai, uodo trūklio lervos ir pan.).
8. Žuvies ištraukimas ne savo sektoriuje yra leidžiamas kaimyniniam sektoriui sutikus. Bristi į vandenį galima tik iki juosmens.
9. Kol žuvis bus pasverta ir užregistruota, ją reikia laikyti specialiame maiše, vandenyje. Viename maiše gali būti ne daugiau kaip viena žuvis. Privaloma turėti ne mažiau kaip 7 specialius maišus žuviai laikyti.
10. Kiekviena komanda privalo turėti specialų čiužinį žuviai guldyti ant žemės (matą).
11. Kiekviena varžybų komanda turi turėti ne mažiau kaip du graibštus.
12. Registruojamos tik gyvos žuvys, pagautos varžybų tvenkinyje varžybų metu.
13. Įskaitinės žuvys yra visų rūšių karpiai ir amūrai.
14. Sugautos įskaitinės žuvys sveriamos tik teisėjo svėrimo įrankiais ir svarstyklėmis. Žuvis sveriama kiek galima dažniau, bet ne rečiau kaip 3 kartus per parą.
15. Jeigu žuvis užkibo iki varžybų pabaigos ir varžybų dalyvis mano, kad žuvis galimai bus ištraukta jau po varžybų finišo, ją leidžiama ištraukti, ir ji bus registruojama, tačiau nedelsiant po kibimo turi būti pranešta teisėjui arba kaimynams, kad žuvis traukiama.
16. Kiekvieno sektoriaus šoninės ribos yra pažymėtos. Kai kurie sektoriai gali būti apriboti ir metimo nuotoliu. Apie sektorių apribojimus varžybų organizatoriai informuos iš anksto. Ginčus tarp dalyvių dėl žūklės sektorių ribų sprendžia patys varžybų dalyviai, neišsprendus ginčo – jis sprendžiamas neapskundžiamu (galutiniu) varžybų teisėjo sprendimu.
17. Komandos abiems nariams pasitraukus iš sektoriaus toliau nei 50 metrų žūklės įrankiai turi būti ištraukti iš vandens.
18. Į ne savo sektorių patekti kitiems varžybų dalyviams galima tik gavus sektoriaus dalyvio sutikimą. Sutikimas nebūtinas varžybų organizatoriui, teisėjui, telkinio savininkui arba jo atstovui, žurnalistams.
19. Varžybos dalyviai privalo: gerbti kitus varžybų dalyvius; esant nenumatytai situacijai (trauma, nelaimingas atsitikimas ir t.t..) padėti kitiems; sektoriuje palaikyti švarą; kilus šiose taisyklėse nenumatytiems klausimams ar situacijoms nedelsiant susisiekti su teisėju ir jį informuoti.
20. Komandai nusižengus taisyklėms pirmą kartą, teisėjai gali stabdyti dalyvavimą varžybose 4 val., Komandai prasižengus antrą kartą, skiriama 8 val. diskvalifikacija. Trečią kartą nusižengęs taisyklėms komanda diskvalifikuojama. Už grubius taisyklių pažeidimus ar besaikį alkoholio vartojimą, dalyvis gali būti šalinamas iš varžybų nedelsiant teisėjų nuožiūra");
        $competition->setCompetitionWeighingsCount(4);
        $competition->setCompetitionApproved(true);

        $manager->persist($competition);
        $manager->flush();

        $this->addReference(self::COMPETITION_REFERENCE, $competition);

    }
}
