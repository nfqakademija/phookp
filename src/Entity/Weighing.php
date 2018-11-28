<?php

namespace App\Entity;

use App\Services\ResultService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeighingRepository")
 */
class Weighing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $weighingTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="weighings")
     * @ORM\JoinColumn(nullable=false,  referencedColumnName="id_competition")
     */
    private $competition;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Result", mappedBy="weighing")
     */
    private $results;

    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeighingTime(): ?\DateTimeInterface
    {
        return $this->weighingTime;
    }

    public function setWeighingTime(?\DateTimeInterface $weighingTime): self
    {
        $this->weighingTime = $weighingTime;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function setResults(Collection $results)
    {
        $this->results = $results;
    }

    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setWeighing($this);
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getWeighing() === $this) {
                $result->setWeighing(null);
            }
        }

        return $this;
    }
}
