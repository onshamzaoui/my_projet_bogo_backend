<?php

namespace App\Entity;

use App\Repository\FacturationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacturationRepository::class)
 */
class Facturation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="facturation")
     */
    private $id_Client;

    /**
     * @ORM\OneToMany(targetEntity=Deal::class, mappedBy="facturation")
     */
    private $id_Deal;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type_paiment;

    public function __construct()
    {
        $this->id_Client = new ArrayCollection();
        $this->id_Deal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Client[]
     */
    public function getIdClient(): Collection
    {
        return $this->id_Client;
    }

    public function addIdClient(Client $idClient): self
    {
        if (!$this->id_Client->contains($idClient)) {
            $this->id_Client[] = $idClient;
            $idClient->setFacturation($this);
        }

        return $this;
    }

    public function removeIdClient(Client $idClient): self
    {
        if ($this->id_Client->removeElement($idClient)) {
            // set the owning side to null (unless already changed)
            if ($idClient->getFacturation() === $this) {
                $idClient->setFacturation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Deal[]
     */
    public function getIdDeal(): Collection
    {
        return $this->id_Deal;
    }

    public function addIdDeal(Deal $idDeal): self
    {
        if (!$this->id_Deal->contains($idDeal)) {
            $this->id_Deal[] = $idDeal;
            $idDeal->setFacturation($this);
        }

        return $this;
    }

    public function removeIdDeal(Deal $idDeal): self
    {
        if ($this->id_Deal->removeElement($idDeal)) {
            // set the owning side to null (unless already changed)
            if ($idDeal->getFacturation() === $this) {
                $idDeal->setFacturation(null);
            }
        }

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->Duree;
    }

    public function setDuree(\DateTimeInterface $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getTypePaiment(): ?string
    {
        return $this->Type_paiment;
    }

    public function setTypePaiment(string $Type_paiment): self
    {
        $this->Type_paiment = $Type_paiment;

        return $this;
    }
}
