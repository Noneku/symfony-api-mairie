<?php

namespace App\Entity;

use App\Repository\PoleRepository;
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
}
