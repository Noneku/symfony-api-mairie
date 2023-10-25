<?php

namespace App\Entity;

use App\Repository\IndexPoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndexPoleRepository::class)]
class IndexPole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $indexNom = null;

    #[ORM\Column(length: 255)]
    private ?string $urlIndex = null;

    #[ORM\OneToOne(mappedBy: 'urlIndex', cascade: ['persist', 'remove'])]
    private ?RapportActivite $rapportActivite = null;

    #[ORM\ManyToOne(inversedBy: 'indexPoles')]
    private ?Pole $Pole = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndexNom(): ?string
    {
        return $this->indexNom;
    }

    public function setIndexNom(string $indexNom): static
    {
        $this->indexNom = $indexNom;

        return $this;
    }

    public function getUrlIndex(): ?string
    {
        return $this->urlIndex;
    }

    public function setUrlIndex(string $urlIndex): static
    {
        $this->urlIndex = $urlIndex;

        return $this;
    }

    public function getRapportActivite(): ?RapportActivite
    {
        return $this->rapportActivite;
    }

    public function setRapportActivite(RapportActivite $rapportActivite): static
    {
        // set the owning side of the relation if necessary
        if ($rapportActivite->getUrlIndex() !== $this) {
            $rapportActivite->setUrlIndex($this);
        }

        $this->rapportActivite = $rapportActivite;

        return $this;
    }

    public function getPole(): ?Pole
    {
        return $this->Pole;
    }

    public function setPole(?Pole $Pole): static
    {
        $this->Pole = $Pole;

        return $this;
    }
}
