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
        $competition->setCompetitionRules("

    Pagal atvykusių komandų eilės tvarką komandos traukia eilės numerius pagal kurios komandos trauks sektoriaus numerį. Po komandų sektorių traukimo, pretenzijos dėl sektorių nepriimamos.

    Pasiruošimo metu komandos gali tyrinėti sektorių markeriu. Markeris naudojamas tik dugno tyrinėjimui ir gylio nustatymui, baigus dugno tyrinėjimą markeris turi būti ištrauktas iš vandens. Markerį naudoti kaip žymeklį draudžiama.

    Jaukinti žuvį ir masalus mesti į vandenį galima tik nuo varžybų pradžios.

    Komanda gali žvejoti 4 įrankiais turinčiais po 1 kablį. Paruoštų įrankių skaičius neribojamas.

    Meškerės turi būti žūklės sektoriuje, paruoštoje zonoje. Jaukinti galima tik iš savo sektoriaus zonos visais būdais, išskyrus valtis ir specialius laivelius. Galima bristi į vandenį ne giliau kaip iki juosmens.

    Nuo 22 valandos vakaro iki 5 valandos ryto jaukinti žuvis naudojant triukšmingus jaukinimo įrankius, tokius kaip spomb‘as, raketas, „krabus“ draudžiama.

    Masalų užmetimui galioja šių taisyklių penkto punkto reikalavimai.

    Ne komandos dalyviams dalyvauti žvejybos procese (imti žūklės įrankius, ruošti pašarus ir pan.) draudžiama.

    Masalas tvirtinamas prie kabliuko naudojant „plauko sistemą“ (negalima verti tiesiai ant kabliuko).

    Draudžiama naudoti gyvus ir cielus gyvulinės kilmės jaukus ir masalus (musės lervos, sliekai, uodo trūklio lervos ir pan.).

    Žuvies ištraukimas ne savo sektoriuje yra leidžiamas kaimyninio sektoriaus komandai sutikus.

    Kol žuvis bus pasverta ir užregistruota, ją reikia laikyti specialiame maiše, vandenyje. Viename maiše gali būti ne daugiau kaip viena žuvis. (savininkui sutikus galima žuvį laikyti graibšte kol ji bus pasverta). Komanda privalo turėti ne mažiau kaip 6 specialius maišus žuviai laikyti.

    Žuvys sveriamos tris kartus per parą. Esant galimybei, žuvys gali būti sveriamos ir dažniau.

    Kiekviena komanda privalo turėti specialų čiužinį žuviai guldyti ant žemės (matą).

    Registruojamos tik gyvos žuvys, pagautos „Didelėsžuvys.lt“ tvenkinyje varžybų metu.

    Įskaitinės žuvys yra nuo 5 kg visų rūšių karpiai, amūrai, eršketai, šamai.

    Jei ištraukus žuvį kabliukas nėra įkibęs galvos srityje, žuvis neužskaitoma.

    Sugautos įskaitinės žuvys sveriamos tik teisėjo svėrimo įrankiais ir svarstyklėmis.

    Jeigu žuvis užkibo iki varžybų pabaigos ir komanda mano, kad žuvis galimai bus ištraukta jau po varžybų finišo, ją leidžiama ištraukti ir ji bus registruojama, tačiau nedelsiant po kibimo turi būti pranešta teisėjui arba kaimyninėm komandom, kad žuvis traukiama. Nesant tokio pranešimo teisėjui, žuvis bus registruojama tik tuo atveju, jei ji bus ištraukta ir apie tai paliudys kaimyninės komandos, kad žuvis užkibo iki varžybų pabaigos.

    Kiekvieno sektoriaus šoninės ribos yra pažymėtos kuoliukais. Kai kurie sektoriai gali būti apriboti ir metimo nuotoliu. Apie sektorių apribojimus varžybų organizatoriai informuos iš anksto. Ginčus tarp komandų dėl žūklės sektorių ribų sprendžia patys varžybų dalyviai, neišsprendus ginčo – jis sprendžiamas neapskundžiamu (galutiniu) varžybų teisėjo sprendimu.

    Komandos nariams pasitraukus iš sektoriaus toliau nei 50 metrų žūklės įrankiai turi būti ištraukti iš vandens (išskyrus markerį).

    Į sektorių patekti kitiems varžybų dalyviams galima tik gavus komandos narių sutikimą. Sutikimas nebūtinas varžybų organizatoriui, teisėjui, telkinio savininkui arba jo atstovui, žurnalistams.

    Varžybose dalyvaujanti komanda privalo: gerbti kitus varžybų dalyvius; esant nenumatytai situacijai (trauma, nelaimingas atsitikimas ir t.t..) padėti kitiems; sektoriuje palaikyti švarą; kilus šiose taisyklėse nenumatytiems klausimams ar situacijoms nedelsiant susisiekti su teisėju ir jį informuoti.

    Nusižengusiai taisyklėms komandai pirmą kartą teisėjai gali skirti nuobaudą -5kg iš komandos sugautų žuvų svorio. Antrą kartą prasižengusiai kamandai skiriama nuobauda -10kg iš komandos sugautų žuvų svorio. Trečią kartą nusižengusi taisyklėms komanda diskvalifikuojama. Už grubius taisyklių pažeidimus ar besaikį alkoholio vartojimą, komanda gali būti šalinama iš varžybų nedelsiant teisėjų nuožiūra.

 

Komandos varžybų starto mokestis 200 € sumokamas ne vėliau kaip likus 60 dienų iki varžybų pradžios.

Sumokėti galima banko pavedimu

Sąskaita - LT077290000139702013

Gavėjas - Kęstutis Arbačiauskas

Mokėjimo paskirtis - Varžybų starto mokestis \"komandos pavadinimas\"

Pirmąją vietą užėmusi komanda ateinančių metų varžybose registruojama be startinio mokesčio.");
        $competition->setCompetitionType("total");
        $competition->setCompetitionWeighingsCount(6);
        $competition->setCompetitionApproved(true);

        $manager->persist($competition);
        $manager->flush();

        $this->addReference(self::COMPETITION_REFERENCE, $competition);

    }
}
