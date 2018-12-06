<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     * * @Assert\Type(type = "string",
     *              message = "Neteisingas komandos pavadinimo formatas"
     * )
     *   @Assert\Length(
     *     min=2,
     *     max=90,
     *     minMessage="Komandos pavadinimo pavadinimo ilgis turi būti tarp 2 ir 90 simbolių!",
     *     maxMessage="Komandos pavadinimo ilgis turi būti tarp 2 ir 90 simbolių!"
     * )
     */
    private $teamName;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * * @Assert\Type(type = "integer",
     *              message = "Privalote įvesti skaičių"
     * )
     * @Assert\Length(
     *     max=2,
     *     maxMessage="sektorius gali būti tik dviženklis skaičius!"
     * )
     */
    private $sectorNr;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="teams")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id" )
     */
    private $competition;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Assert\Type(type = "string",
     *              message = "Neteisingas vardo formatas"
     * )
     */
    private $firstTeamMember;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Assert\Type(type = "string",
     *              message = "Neteisingas vardo formatas"
     * )
     */
    private $thirdTeamMember;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     *  @Assert\Type(type = "string",
     *              message = "Neteisingas vardo formatas"
     * )
     */
    private $secondTeamMember;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Result", mappedBy="team")
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

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;
        $competition->getTeams()->add($this);
        return $this;
    }

    public function getFirstTeamMember(): ?string
    {
        return $this->firstTeamMember;
    }

    public function setFirstTeamMember(?string $firstTeamMember): self
    {
        $this->firstTeamMember = $firstTeamMember;
        return $this;
    }

    public function getThirdTeamMember(): ?string
    {
        return $this->thirdTeamMember;
    }

    public function setThirdTeamMember(?string $thirdTeamMember): self
    {
        $this->thirdTeamMember = $thirdTeamMember;
        return $this;
    }

    public function getSecondTeamMember(): ?string
    {
        return $this->secondTeamMember;
    }

    public function setSecondTeamMember(?string $secondTeamMember): self
    {
        $this->secondTeamMember = $secondTeamMember;
        return $this;
    }

    /**
     * @return Collection|Result[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setTeam($this);
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getTeam() === $this) {
                $result->setTeam(null);
            }
        }
        return $this;
    }

    public function totalWeigh(): int
    {
        $total = 0;
        foreach ($this->getResults() as $result)
        {
            $total += $result->getWeigh();
        }

        return $total;
    }

    public function findBigFish(): int
    {
        $biggestFish = 0;
        foreach ($this->getResults() as $result)
        {
            if($result->getWeigh() > $biggestFish)
                $biggestFish = $result->getWeigh();
        }
        return $biggestFish;
    }
}
