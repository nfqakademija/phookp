<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.2
 * Time: 01.07
 */

namespace App\Interfaces;


use App\Entity\Event;

interface IEventRepository
{
    public function find(int $id): Event;

    public function findByHash(string $hash): Event;

    public function save(Event $event): void;

}