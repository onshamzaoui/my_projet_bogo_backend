<?php

namespace App\Entity;

use App\Repository\DealRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DealRepository::class)
 */
class Deal
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
    private $DealName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DealImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\OneToOne(targetEntity=Category::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $CategoryName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Fin;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Facturation::class, inversedBy="id_deal")
     */
    private $facturation;

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDealName(): ?string
    {
        return $this->DealName;
    }

    public function setDealName(string $DealName): self
    {
        $this->DealName = $DealName;

        return $this;
    }

    public function getDealImage(): ?string
    {
        return $this->DealImage;
    }

    public function setDealImage(string $DealImage): self
    {
        $this->DealImage = $DealImage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getCategoryName(): ?Category
    {
        return $this->CategoryName;
    }

    public function setCategoryName(Category $CategoryName): self
    {
        $this->CategoryName = $CategoryName;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->Date_Debut;
    }

    public function setDateDebut(\DateTimeInterface $Date_Debut): self
    {
        $this->Date_Debut = $Date_Debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->Date_Fin;
    }

    public function setDateFin(\DateTimeInterface $Date_Fin): self
    {
        $this->Date_Fin = $Date_Fin;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getFacturation(): ?Facturation
    {
        return $this->facturation;
    }

    public function setFacturation(?Facturation $facturation): self
    {
        $this->facturation = $facturation;

        return $this;
    }


}
