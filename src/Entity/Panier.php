<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 */
class Panier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Deal::class)
     */
    private $deal_id;

    /**
     * @ORM\ManyToMany(targetEntity=consumer::class, inversedBy="paniers")
     */
    private $consumer_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function __construct()
    {
        $this->deal_id = new ArrayCollection();
        $this->consumer_id = new ArrayCollection();
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
     * @return Collection|consumer[]
     */
    public function getConsumerId(): Collection
    {
        return $this->consumer_id;
    }

    public function addConsumerId(consumer $consumerId): self
    {
        if (!$this->consumer_id->contains($consumerId)) {
            $this->consumer_id[] = $consumerId;
        }

        return $this;
    }

    public function removeConsumerId(consumer $consumerId): self
    {
        $this->consumer_id->removeElement($consumerId);

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
