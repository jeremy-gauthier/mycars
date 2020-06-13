<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=car::class, mappedBy="brand")
     */
    private $brand;

    public function __construct()
    {
        $this->brand = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|car[]
     */
    public function getBrand(): Collection
    {
        return $this->brand;
    }

    public function addBrand(car $brand): self
    {
        if (!$this->brand->contains($brand)) {
            $this->brand[] = $brand;
            $brand->setBrand($this);
        }

        return $this;
    }

    public function removeBrand(car $brand): self
    {
        if ($this->brand->contains($brand)) {
            $this->brand->removeElement($brand);
            // set the owning side to null (unless already changed)
            if ($brand->getBrand() === $this) {
                $brand->setBrand(null);
            }
        }

        return $this;
    }
}
