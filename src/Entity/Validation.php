<?php

namespace App\Entity;

use App\Repository\ValidationRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ValidationRepository::class)
 */
class Validation
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Admin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_Admin;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Deal::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_Deal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Code_Promo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Point_Fidelite;


    

    public function getIdAdmin(): ?Admin
    {
        return $this->id_Admin;
    }

    public function setIdAdmin(?Admin $id_Admin): self
    {
        $this->id_Admin = $id_Admin;

        return $this;
    }

    public function getIdDeal(): ?Deal
    {
        return $this->id_Deal;
    }

    public function setIdDeal(?Deal $id_Deal): self
    {
        $this->id_Deal = $id_Deal;

        return $this;
    }

    public function getCode_Promo(): ?string
    {
        return $this->Code_Promo;
    }

    public function setCode_Promo(?string $Code_Promo): self
    {
        $this->Code_Promo = $Code_Promo;

        return $this;
    }

    public function getPointFidelite(): ?int
    {
        return $this->Point_fidelite;
    }

    public function setPointFidelite(?int $Point_fidelite): self
    {
        $this->Point_fidelite = $Point_fidelite;

        return $this;
    }
}

