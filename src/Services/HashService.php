<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.15
 * Time: 02.06
 */

namespace App\Services;


use App\Entity\Competition;
use App\Entity\Hash;
use App\Repository\HashRepository;

class HashService
{

    private $hashRepository;
    /**
     * HashService constructor.
     */
    public function __construct(HashRepository $hashRepository)
    {
        $this->hashRepository = $hashRepository;
    }



    public function create(Competition $competition): ?Hash
    {
        $hash = new Hash();

        $hash->setHash($this->generateHash());
        $hash->setCompetition($competition);
        $this->hashRepository->save($hash);
        $this->hashRepository->flush();

        return $hash;
    }
    public function findByHash($hash){
        return $this->hashRepository->findByHash($hash);
    }


    private function generateHash(): string
    {
        $randString = "";

        while(strlen($randString) < 40)
        {
            $randString .= mt_rand(1, 999999);
            $randString .= time();
        }
        return md5($randString);
    }
}