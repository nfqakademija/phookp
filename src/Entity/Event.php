<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idEvent;

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
    private $eventName;

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
    private $eventDate;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *     min = 1,
     *     max = 10,
     *     minMessage="Renginio trukme negali buti trumpesne nei viena diena!",
     *     maxMessage="Renginio trukme negali virsyti 10 dienu!"
     * )
     */
    private $eventDuration = 1;

    /**
     * @ORM\Column(type="string", length=90)
     * @Assert\Length(
     *     min=3,
     *     max=90,
     *     minMessage="Organizatoriaus vardo ar pavadinimo ilgis turi buti tarp 3 ir 90 simboliu!",
     *     maxMessage="Organizatoriaus vardo ar pavadinimo ilgis turi buti tarp 3 ir 90 simboliu!"
     * )
     */
    private $eventOrganiser;

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
    private $eventOrganiserEmail;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Choice(
     *     choices = {"total", "top5"},
     *     message = "Nezinomas varzybu tipas!"
     * )
     */
    private $eventType;

    /**
     * @ORM\Column(type="boolean")
     */
    private $eventApproved = false;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $eventStatus = "unconfirmed";


    public function getIdEvent(): ?int
    {
        return $this->idEvent;
    }

    public function setIdEvent(int $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    public function setEventName(string $eventName): self
    {
        $this->eventName = $eventName;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(\DateTimeInterface $eventDate): self
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function getEventDuration(): ?int
    {
        return $this->eventDuration;
    }

    public function setEventDuration(int $eventDuration): self
    {
        $this->eventDuration = $eventDuration;

        return $this;
    }

    public function getEventOrganiser(): ?string
    {
        return $this->eventOrganiser;
    }

    public function setEventOrganiser(string $eventOrganiser): self
    {
        $this->eventOrganiser = $eventOrganiser;

        return $this;
    }

    public function getEventOrganiserEmail(): ?string
    {
        return $this->eventOrganiserEmail;
    }

    public function setEventOrganiserEmail(string $eventOrganiserEmail): self
    {
        $this->eventOrganiserEmail = $eventOrganiserEmail;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function setEventType(string $eventType): self
    {
        $this->eventType = $eventType;

        return $this;
    }

    public function getEventApproved(): ?bool
    {
        return $this->eventApproved;
    }

    public function setEventApproved(bool $eventApproved): self
    {
        $this->eventApproved = $eventApproved;

        return $this;
    }

    public function getEventStatus(): ?string
    {
        return $this->eventStatus;
    }

    public function setEventStatus(string $eventStatus): self
    {
        $this->eventStatus = $eventStatus;

        return $this;
    }
}
