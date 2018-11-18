<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
