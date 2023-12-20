<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_list = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?float $prixTotal = null;

    #[ORM\ManyToOne(inversedBy: 'commands')]
    private ?User $userId = null;

    #[ORM\OneToMany(mappedBy: 'commandId', targetEntity: ProductCommand::class)]
    private Collection $productCommands;

    public function __construct()
    {
        $this->productCommands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateList(): ?\DateTimeInterface
    {
        return $this->date_list;
    }

    public function setDateList(\DateTimeInterface $date_list): static
    {
        $this->date_list = $date_list;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): static
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection<int, ProductCommand>
     */
    public function getProductCommands(): Collection
    {
        return $this->productCommands;
    }

    public function addProductCommand(ProductCommand $productCommand): static
    {
        if (!$this->productCommands->contains($productCommand)) {
            $this->productCommands->add($productCommand);
            $productCommand->setCommandId($this);
        }

        return $this;
    }

    public function removeProductCommand(ProductCommand $productCommand): static
    {
        if ($this->productCommands->removeElement($productCommand)) {
            // set the owning side to null (unless already changed)
            if ($productCommand->getCommandId() === $this) {
                $productCommand->setCommandId(null);
            }
        }

        return $this;
    }
}
