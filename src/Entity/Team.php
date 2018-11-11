<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Results", inversedBy="teams")
     */

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTeam;

    /**
     * @ORM\Column(type="text", length=45)
     */
    private $teamName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sectorNr;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */

    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $teamMember;

    /*
     * Getters
     * */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }
    public function getSectorNr(): ?int
    {
        return $this->sectorNr;
    }

    /*
     * Setters
     * */
    public function setTeamName(string $name):void
    {
        $this->teamName = $name;
    }
    public function setSectorNr(int $nr):void
    {
        $this->sectorNr = $nr;
    }
}
