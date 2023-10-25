<?php

namespace App\Entity;

use App\Repository\PoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoleRepository::class)]
class Pole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $poleNom = null;

    #[ORM\OneToMany(mappedBy: 'Pole', targetEntity: IndexPole::class)]
    private Collection $indexPoles;

    public function __construct()
    {
        $this->indexPoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoleNom(): ?string
    {
        return $this->poleNom;
    }

    public function setPoleNom(string $poleNom): static
    {
        $this->poleNom = $poleNom;

        return $this;
    }

    /**
     * @return Collection<int, IndexPole>
     */
    public function getIndexPoles(): Collection
    {
        return $this->indexPoles;
    }

    public function addIndexPole(IndexPole $indexPole): static
    {
        if (!$this->indexPoles->contains($indexPole)) {
            $this->indexPoles->add($indexPole);
            $indexPole->setPole($this);
        }

        return $this;
    }

    public function removeIndexPole(IndexPole $indexPole): static
    {
        if ($this->indexPoles->removeElement($indexPole)) {
            // set the owning side to null (unless already changed)
            if ($indexPole->getPole() === $this) {
                $indexPole->setPole(null);
            }
        }

        return $this;
    }
}
