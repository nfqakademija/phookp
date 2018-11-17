<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\competitionRepository")
 */
class Competition
{

    public const TYPE_TOP5 = "top5";
    public const TYPE_TOTAL = "total";
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idCompetition;
    /**
     * @ORM\Column(type="string", length=90)
     * @Assert\Type(type = "string",
     *              message = "Neteisingas renginio pavadinimo formatas"
     * )
     * @Assert\Length(
     *     min = 3,
     *     max = 90,
     *     minMessage = "Renginio pavadinimas negali būti trumpesnis nei 3 simboliai!",
     *     maxMessage = "Renginio pavadinimas negali būti ilgesnis nei 90 simboliai!"
     * )
     */
    private $competitionName;
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     * @Assert\DateTime(
     *     format = "Y-m-d",
     *     message= "Netinkamas renginio datos formatas!"
     * )
     * @Assert\Range(
     *     min="now",
     *     max="+2 years",
     *     minMessage="Neteisingai nurodyta renginio data!",
     *     maxMessage="Negalima planuoti renginių daugiau nei du metai į priekį!"
     * )
     */
    private $competitionDate;
    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *     min = 1,
     *     max = 10,
     *     minMessage="Renginio trukmė negali būti trumpesnė nei viena diena!",
     *     maxMessage="Renginio trukmė negali viršyti 10 dienų!"
     * )
     */
    private $competitionDuration = 1;
    /**
     * @ORM\Column(type="string", length=90)
     * @Assert\Length(
     *     min=3,
     *     max=90,
     *     minMessage="Organizatoriaus vardo ar pavadinimo ilgis turi būti tarp 3 ir 90 simbolių!",
     *     maxMessage="Organizatoriaus vardo ar pavadinimo ilgis turi būti tarp 3 ir 90 simbolių!"
     * )
     */
    private $competitionOrganiser;
    /**
     * @ORM\Column(type="string", length=90)
     * @Assert\Email(
     *     message="El.pašto adresas įvestas neteisingai!"
     * )
     * @Assert\Length(
     *     max="90",
     *     maxMessage="El. .pašto adreso ilgis negali virsyti 90 simboliu!"
     * )
     */
    private $competitionOrganiserEmail;
    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Choice(
     *     choices = {"total", "top5"},
     *     message = "Nezinomas varzybu tipas!"
     * )
     */
    private $competitionType;
    /**
     * @ORM\Column(type="boolean")
     */
    private $competitionApproved = false;
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $competitionStatus = "unconfirmed";
    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *     min="1",
     *     max="99",
     *     minMessage="Varzybu sektoriu skaicius negali buti mazesnis nei 1!",
     *     maxMessage="Varzybu sektoriu skaicius negali virsyti 99!"
     * )
     */
    private $competitionSectorCount = 1;
    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *     min="1",
     *     max="20",
     *     minMessage="Sverimu skaicius negali buti mazesnis nei 1!",
     *     maxMessage="Sverimu skaicius negali virsyti 20!"
     * )
     */
    private $competitionWeighingsCount = 1;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * * @Assert\Url(
     *     message="Nurodyta nuoroda yra neteisinga",
     * )
     */
    private $competitionLink;
    /**
     * @ORM\Column(type="string", length=135, nullable=true)
     */
    private $competitionRules;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hash", mappedBy="competition")
     */
    private $competitionHashes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="competition")
     */
    private $teams;
    /**
     * Competition constructor.
     * @param $competitionHashes
     */
    public function __construct()
    {
        $this->competitionHashes = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }
    public function getIdCompetition(): ?int
    {
        return $this->idCompetition;
    }
    public function setIdCompetition(int $idCompetition): self
    {
        $this->idCompetition = $idCompetition;
        return $this;
    }
    public function getCompetitionName(): ?string
    {
        return $this->competitionName;
    }
    public function setCompetitionName(string $competitionName): self
    {
        $this->competitionName = $competitionName;
        return $this;
    }
    public function getCompetitionDate(): ?\DateTimeInterface
    {
        return $this->competitionDate;
    }
    public function setCompetitionDate(\DateTimeInterface $competitionDate): self
    {
        $this->competitionDate = $competitionDate;
        return $this;
    }
    public function getCompetitionDuration(): ?int
    {
        return $this->competitionDuration;
    }
    public function setCompetitionDuration(int $competitionDuration): self
    {
        $this->competitionDuration = $competitionDuration;
        return $this;
    }
    public function getCompetitionOrganiser(): ?string
    {
        return $this->competitionOrganiser;
    }
    public function setCompetitionOrganiser(string $competitionOrganiser): self
    {
        $this->competitionOrganiser = $competitionOrganiser;
        return $this;
    }
    public function getCompetitionOrganiserEmail(): ?string
    {
        return $this->competitionOrganiserEmail;
    }
    public function setCompetitionOrganiserEmail(string $competitionOrganiserEmail): self
    {
        $this->competitionOrganiserEmail = $competitionOrganiserEmail;
        return $this;
    }
    public function getCompetitionType(): ?string
    {
        return $this->competitionType;
    }
    public function setCompetitionType(string $competitionType): self
    {
        $this->competitionType = $competitionType;
        return $this;
    }
    public function getCompetitionApproved(): ?bool
    {
        return $this->competitionApproved;
    }
    public function setCompetitionApproved(bool $competitionApproved): self
    {
        $this->competitionApproved = $competitionApproved;
        return $this;
    }
    public function getCompetitionStatus(): ?string
    {
        return $this->competitionStatus;
    }
    public function setCompetitionStatus(string $competitionStatus): self
    {
        $this->competitionStatus = $competitionStatus;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getCompetitionWeighingsCount(): int
    {
        return $this->competitionWeighingsCount;
    }
    /**
     * @param mixed $competitionWeighingsCount
     */
    public function setCompetitionWeighingsCount(int $competitionWeighingsCount): void
    {
        $this->competitionWeighingsCount = $competitionWeighingsCount;
    }
    /**
     * @return mixed
     */
    public function getCompetitionSectorCount(): int
    {
        return $this->competitionSectorCount;
    }
    /**
     * @param mixed $competitionSectorCount
     */
    public function setCompetitionSectorCount(int $competitionSectorCount): void
    {
        $this->competitionSectorCount = $competitionSectorCount;
    }
    /**
     * @return Collection|Hash[]
     */
    public function getCompetitionHashes(): Collection
    {
        return $this->competitionHashes;
    }
    public function addCompetitionHash(Hash $competitionHash): self
    {
        if (!$this->competitionHashes->contains($competitionHash)) {
            $this->competitionHashes[] = $competitionHash;
            $competitionHash->setCompetition($this);
        }
        return $this;
    }
    public function removeCompetitionHash(Hash $competitionHash): self
    {
        if ($this->competitionHashes->contains($competitionHash)) {
            $this->competitionHashes->removeElement($competitionHash);
            // set the owning side to null (unless already changed)
            if ($competitionHash->getCompetition() === $this) {
                $competitionHash->setCompetition(null);
            }
        }
        return $this;
    }
    public function getCompetitionLink(): ?string
    {
        return $this->competitionLink;
    }
    public function setCompetitionLink(?string $competitionLink): self
    {
        $this->competitionLink = $competitionLink;
        return $this;
    }
    public function getCompetitionRules(): ?string
    {
        return $this->competitionRules;
    }
    public function setCompetitionRules(?string $competitionRules): self
    {
        $this->competitionRules = $competitionRules;
        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->setCompetition($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getCompetition() === $this) {
                $team->setCompetition(null);
            }
        }

        return $this;
    }
}