<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.30
 * Time: 02.58
 */

namespace App\Services;


class FixtureService
{

    private $teamNameFirstWord = array(
        'Raudoni', 'Zali ', 'Melyni', 'Perauge', 'Best', 'Outsiders', 'Pagyvene', 'NR 1', 'Praplike',
        '0.7', 'Nestabdom', 'Belekas', 'Big', 'Naujieji', 'Top', 'ZZZ', '123', 'Kaip', 'Nemiegam', 'Anoniminiai',
        'Moby'
    );

    private $teamNameSecondWord = array (
        'karpiai', 'karosai', 'velniai', 'seniai', 'best', 'vierchai', 'kaimieciai', 'oho', 'lenkai', 'veziai',
        'laukiniai', 'belekas', 'Dick', 'winners', 'alkoholikai', 'ribakai', 'kaliosas', 'team', 'plz let us win'
    );

    public function getFutureDate(): \DateTime
    {
        $randDays = mt_rand(5, 60);
        return new \DateTime("+$randDays");
    }
}