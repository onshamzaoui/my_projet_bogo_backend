<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $category_name;

    /**
     * @ORM\OneToMany(targetEntity=Promo::class, mappedBy="id_category")
     */
    private $code_promo;

    /**
     * @ORM\OneToMany(targetEntity=Deal::class, mappedBy="category", orphanRemoval=true)
     */
    private $deals;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->code_promo = new ArrayCollection();
        $this->deals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getCodePromo(): Collection
    {
        return $this->code_promo;
    }

    public function addCodePromo(Promo $codePromo): self
    {
        if (!$this->code_promo->contains($codePromo)) {
            $this->code_promo[] = $codePromo;
            $codePromo->setIdCategory($this);
        }

        return $this;
    }

    public function removeCodePromo(Promo $codePromo): self
    {
        if ($this->code_promo->removeElement($codePromo)) {
            // set the owning side to null (unless already changed)
            if ($codePromo->getIdCategory() === $this) {
                $codePromo->setIdCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Deal[]
     */
    public function getDeals(): Collection
    {
        return $this->deals;
    }

    public function addDeal(Deal $deal): self
    {
        if (!$this->deals->contains($deal)) {
            $this->deals[] = $deal;
            $deal->setCategory($this);
        }

        return $this;
    }

    public function removeDeal(Deal $deal): self
    {
        if ($this->deals->removeElement($deal)) {
            // set the owning side to null (unless already changed)
            if ($deal->getCategory() === $this) {
                $deal->setCategory(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
