<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HashRepository")
 */
class Hash
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $hash;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="competitionHashes")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id_competition" )
     */
    private $competition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;
        $competition->getCompetitionHashes()->add($this);
        return $this;
    }
}
