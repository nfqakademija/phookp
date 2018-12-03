<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitionRepository")
 */
class Competition
{

    public const TYPE_TOP5 = "top5";
    public const TYPE_TOTAL = "total";
    public const STATUS_UNCONFIRMED = "unconfirmed";
    public const STATUS_CONFIRMED = "confirmed";
    public const STATUS_STARTED = "started";
    public const STATUS_FINISHED = "finished";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
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
     *     maxMessage="El.pašto adresas negali viršyti 90 simbolių!"
     * )
     */
    private $competitionOrganiserEmail;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Choice(
     *     choices = {"total", "top5"},
     *     message = "Nežinomas varžybų tipas!"
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
    private $competitionStatus = Competition::STATUS_UNCONFIRMED;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *     min="1",
     *     max="99",
     *     minMessage="Varžybų komandų skaičius negali būti mažesnis nei 1!",
     *     maxMessage="Varžybų komandų skaičius negali viršyti 99!"
     * )
     */
    private $competitionTeamsCount = 1;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *     min="1",
     *     max="20",
     *     minMessage="Svėrimų skaičius negali būti mažesnis nei 1!",
     *     maxMessage="Svėrimų skaičius negali viršyti 20!"
     * )
     */
    private $competitionWeighingsCount = 1;


    /**
     * @ORM\Column(type="string", nullable=true)
     * * @Assert\Length(
     *     max="90",
     *     maxMessage="Vieta negali viršyti 90 simboliu!",
     * )
     */
    private $competitionLocation;

    /**
     * @ORM\Column(type="string", nullable=true)
     * * @Assert\Url(
     *     message="Nurodyta nuoroda yra neteisinga",
     * )
     */
    private $competitionLink;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *    max="4000",
     *    maxMessage="Taisyklių sąrašas negali viršyti 4000 simbolių"
     * )
     */
    private $competitionRules;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hash", mappedBy="competition")
     */
    private $competitionHashes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Weighing", mappedBy="competition")
     */
    private $weighings;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="competition")
     *
     */
    private $teams;

    /**
     * Competition constructor.
     */
    public function __construct()
    {
        $this->competitionHashes = new ArrayCollection();
        $this->weighings = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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
     * @return int
     */
    public function getCompetitionWeighingsCount(): int
    {
        return $this->competitionWeighingsCount;
    }

    /**
     * @param int $competitionWeighingsCount
     * @return Competition
     */
    public function setCompetitionWeighingsCount(int $competitionWeighingsCount): self
    {
        $this->competitionWeighingsCount = $competitionWeighingsCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompetitionTeamsCount(): int
    {
        return $this->competitionTeamsCount;
    }

    /**
     * @param int $competitionTeamsCount
     * @return Competition
     */
    public function setCompetitionTeamsCount(int $competitionTeamsCount): self
    {
        $this->competitionTeamsCount = $competitionTeamsCount;
        return $this;
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

    /**
     * @return mixed
     */
    public function getCompetitionLocation()
    {
        return $this->competitionLocation;
    }

    /**
     * @param mixed $competitionLocation
     */
    public function setCompetitionLocation($competitionLocation): void
    {
        $this->competitionLocation = $competitionLocation;
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

    /**
     * @param Team $team
     * @return Competition
     */
    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->setCompetition($this);
        }
        return $this;
    }

    /**
     * @param Team $team
     * @return Competition
     */
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

    /**
     * @return Collection|Weighing[]
     */
    public function getWeighings(): Collection
    {
        return $this->weighings;
    }

    /**
     * @param Weighing $weighing
     * @return Competition
     */
    public function addWeighing(Weighing $weighing): self
    {
        if (!$this->weighings->contains($weighing)) {
            $this->weighings[] = $weighing;
            $weighing->setCompetition($this);
        }

        return $this;
    }

    /**
     * @param Weighing $weighing
     * @return Competition
     */
    public function removeWeighing(Weighing $weighing): self
    {
        if ($this->weighings->contains($weighing)) {
            $this->weighings->removeElement($weighing);
            if ($weighing->getCompetition() === $this) {
                $weighing->setCompetition(null);
            }
        }

        return $this;
    }

}
