<?php

namespace App\Entity;

use App\Repository\PromoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromoRepository::class)
 */
class Promo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_promo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $remise_porcentaje;

    /**
     * @ORM\ManyToOne(targetEntity=category::class, inversedBy="code_promo")
     */
    private $id_category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePromo(): ?string
    {
        return $this->code_promo;
    }

    public function setCodePromo(?string $code_promo): self
    {
        $this->code_promo = $code_promo;

        return $this;
    }

    public function getRemisePorcentaje(): ?int
    {
        return $this->remise_porcentaje;
    }

    public function setRemisePorcentaje(?int $remise_porcentaje): self
    {
        $this->remise_porcentaje = $remise_porcentaje;

        return $this;
    }

    public function getIdCategory(): ?category
    {
        return $this->id_category;
    }

    public function setIdCategory(?category $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }
}
