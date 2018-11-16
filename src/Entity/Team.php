<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTeam;

    /**
     * @ORM\Column(type="string", length=45)
     * * @Assert\Type(type = "string",
     *              message = "Neteisingas komandos pavadinimo formatas"
     * )
     */
    private $teamName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sectorNr;

    /**
     * @ORM\Column(type="string", length=135)
     */
    private $teamMembers;

    public function getidTeam(): ?int
    {
        return $this->idTeam;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): self
    {
        $this->teamName = $teamName;

        return $this;
    }

    public function getSectorNr(): ?int
    {
        return $this->sectorNr;
    }

    public function setSectorNr(?int $sectorNr): self
    {
        $this->sectorNr = $sectorNr;

        return $this;
    }

    public function getTeamMembers(): ?string
    {
        return $this->teamMembers;
    }

    public function setTeamMembers(string $teamMembers): self
    {
        $this->teamMembers = $teamMembers;

        return $this;
    }

}
