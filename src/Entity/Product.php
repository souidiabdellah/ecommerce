<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\OneToMany(mappedBy: 'productId', targetEntity: ProductCommand::class)]
    private Collection $commandProducts;

    public function __construct()
    {
        $this->commandId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, ProductCommand>
     */
    public function getCommandId(): Collection
    {
        return $this->commandId;
    }

    public function addCommandId(ProductCommand $commandProducts): static
    {
        if (!$this->$commandProducts->contains($commandProducts)) {
            $this->$commandProducts->add($commandProducts);
            $commandProducts->setProductId($this);
        }

        return $this;
    }

    public function removeCommandId(ProductCommand $commandProducts): static
    {
        if ($this->$commandProducts->removeElement($commandProducts)) {
            // set the owning side to null (unless already changed)
            if ($commandProducts->getProductId() === $this) {
                $commandProducts->setProductId(null);
            }
        }

        return $this;
    }
}
