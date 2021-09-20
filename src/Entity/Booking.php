<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Deal::class, inversedBy="bookings")
     */
    private $deal_id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="bookings")
     */
    private $client_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $duration;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validation;

    public function __construct()
    {
        $this->deal_id = new ArrayCollection();
        $this->client_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|deal[]
     */
    public function getDealId(): Collection
    {
        return $this->deal_id;
    }

    public function addDealId(deal $dealId): self
    {
        if (!$this->deal_id->contains($dealId)) {
            $this->deal_id[] = $dealId;
        }

        return $this;
    }

    public function removeDealId(deal $dealId): self
    {
        $this->deal_id->removeElement($dealId);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getClientId(): Collection
    {
        return $this->client_id;
    }

    public function addClientId(User $clientId): self
    {
        if (!$this->client_id->contains($clientId)) {
            $this->client_id[] = $clientId;
        }

        return $this;
    }

    public function removeClientId(User $clientId): self
    {
        $this->client_id->removeElement($clientId);

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getValidation(): ?bool
    {
        return $this->validation;
    }

    public function setValidation(bool $validation): self
    {
        $this->validation = $validation;

        return $this;
    }
}
