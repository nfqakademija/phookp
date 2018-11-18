<?php
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="teams")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id_competition" )
     */
    private $competition;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $firstTeamMember;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $thirdTeamMember;
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $secondTeamMember;
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
    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }
    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;
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
}

