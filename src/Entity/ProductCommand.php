<?php

namespace App\Entity;

use App\Repository\ProductCommandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductCommandRepository::class)]
class ProductCommand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $prixTotal = null;

    #[ORM\ManyToOne(inversedBy: 'commandId')]
    private ?Product $productId = null;

    #[ORM\ManyToOne(inversedBy: 'productCommands')]
    private ?Command $commandId = null;

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->$prixTotal;
    }

    public function setPrix(float $prixTotal): static
    {
        $this->$prixTotal = $prixTotal;

        return $this;
    }

    public function getProductId(): ?Product
    {
        return $this->productId;
    }

    public function setProductId(?Product $productId): static
    {
        $this->productId = $productId;

        return $this;
    }

    public function getCommandId(): ?Command
    {
        return $this->commandId;
    }

    public function setCommandId(?Command $commandId): static
    {
        $this->commandId = $commandId;

        return $this;
    }
}
