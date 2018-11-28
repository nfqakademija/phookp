<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultRepository")
 */
class Result
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Weighing", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $weighing;

    /**
     * @ORM\Column(type="integer")
     */
    private $weigh;

    /**
     * @ORM\Column(type="boolean")
     */
    private $specialFish;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeighing(): ?Weighing
    {
        return $this->weighing;
    }

    public function setWeighing(?Weighing $weighing): self
    {
        $this->weighing = $weighing;

        return $this;
    }

    public function getWeigh(): ?int
    {
        return $this->weigh;
    }

    public function setWeigh(int $weigh): self
    {
        $this->weigh = $weigh;

        return $this;
    }

    public function getSpecialFish(): ?bool
    {
        return $this->specialFish;
    }

    public function setSpecialFish(bool $specialFish): self
    {
        $this->specialFish = $specialFish;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }
}
