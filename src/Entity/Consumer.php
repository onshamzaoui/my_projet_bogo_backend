<?php

namespace App\Entity;

use App\Repository\ConsumerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsumerRepository::class)
 */
class Consumer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $credit_card;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $point_fidelite;

    /**
     * @ORM\ManyToMany(targetEntity=Panier::class, mappedBy="consumer_id")
     */
    private $paniers;

    public function __construct()
    {
        $this->paniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreditCard(): ?string
    {
        return $this->credit_card;
    }

    public function setCreditCard(?string $credit_card): self
    {
        $this->credit_card = $credit_card;

        return $this;
    }

    public function getPointFidelite(): ?int
    {
        return $this->point_fidelite;
    }

    public function setPointFidelite(?int $point_fidelite): self
    {
        $this->point_fidelite = $point_fidelite;

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers[] = $panier;
            $panier->addConsumerId($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->paniers->removeElement($panier)) {
            $panier->removeConsumerId($this);
        }

        return $this;
    }
}
