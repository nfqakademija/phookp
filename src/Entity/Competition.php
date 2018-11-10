<?php

namespace App\Entity;

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
     *     minMessage = "Renginio pavadinimas negali buti trumpesnis nei 3 simboliai!",
     *     maxMessage = "Renginio pavadinimas negali buti ilgesnis nei 90 simboliai!"
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
     *     maxMessage="Negalima planuoti renginiu daugiau nei du metai i prieki!"
     * )
     */
    private $competitionDate;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *     min = 1,
     *     max = 10,
     *     minMessage="Renginio trukme negali buti trumpesne nei viena diena!",
     *     maxMessage="Renginio trukme negali virsyti 10 dienu!"
     * )
     */
    private $competitionDuration = 1;

    /**
     * @ORM\Column(type="string", length=90)
     * @Assert\Length(
     *     min=3,
     *     max=90,
     *     minMessage="Organizatoriaus vardo ar pavadinimo ilgis turi buti tarp 3 ir 90 simboliu!",
     *     maxMessage="Organizatoriaus vardo ar pavadinimo ilgis turi buti tarp 3 ir 90 simboliu!"
     * )
     */
    private $competitionOrganiser;

    /**
     * @ORM\Column(type="string", length=90)
     * @Assert\Email(
     *     message="El. pasto adresas ivestas neteisingai!"
     * )
     * @Assert\Length(
     *     max="90",
     *     maxMessage="El. pasto adreso ilgis negali virsyti 90 simboliu!"
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
}
