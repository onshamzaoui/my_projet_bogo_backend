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
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="facturations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_client;

    /**
     * @ORM\OneToMany(targetEntity=deal::class, mappedBy="facturation")
     */
    private $id_deal;

    /**
     * @ORM\Column(type="datetime")
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_de_paiment;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    public function __construct()
    {
        $this->id_deal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?Client
    {
        return $this->id_client;
    }

    public function setIdClient(?Client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * @return Collection|deal[]
     */
    public function getIdDeal(): Collection
    {
        return $this->id_deal;
    }

    public function addIdDeal(deal $idDeal): self
    {
        if (!$this->id_deal->contains($idDeal)) {
            $this->id_deal[] = $idDeal;
            $idDeal->setFacturation($this);
        }

        return $this;
    }

    public function removeIdDeal(deal $idDeal): self
    {
        if ($this->id_deal->removeElement($idDeal)) {
            // set the owning side to null (unless already changed)
            if ($idDeal->getFacturation() === $this) {
                $idDeal->setFacturation(null);
            }
        }

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTypeDePaiment(): ?string
    {
        return $this->type_de_paiment;
    }

    public function setTypeDePaiment(string $type_de_paiment): self
    {
        $this->type_de_paiment = $type_de_paiment;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }
}
