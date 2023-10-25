<?php

namespace App\Entity;

use App\Repository\RapportActiviteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportActiviteRepository::class)]
class RapportActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $missionPrincipale = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $indicateur = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $realisation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $perspective = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $donneesFinance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $donneesRH = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $indicateurFile = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $realisationFile = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $perspectiveFile = null;

    #[ORM\OneToOne(inversedBy: 'rapportActivite', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?indexPole $urlIndex = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMissionPrincipale(): ?string
    {
        return $this->missionPrincipale;
    }

    public function setMissionPrincipale(?string $missionPrincipale): static
    {
        $this->missionPrincipale = $missionPrincipale;

        return $this;
    }

    public function getIndicateur(): ?string
    {
        return $this->indicateur;
    }

    public function setIndicateur(?string $indicateur): static
    {
        $this->indicateur = $indicateur;

        return $this;
    }

    public function getRealisation(): ?string
    {
        return $this->realisation;
    }

    public function setRealisation(?string $realisation): static
    {
        $this->realisation = $realisation;

        return $this;
    }

    public function getPerspective(): ?string
    {
        return $this->perspective;
    }

    public function setPerspective(?string $perspective): static
    {
        $this->perspective = $perspective;

        return $this;
    }

    public function getDonneesFinance(): ?string
    {
        return $this->donneesFinance;
    }

    public function setDonneesFinance(?string $donneesFinance): static
    {
        $this->donneesFinance = $donneesFinance;

        return $this;
    }

    public function getDonneesRH(): ?string
    {
        return $this->donneesRH;
    }

    public function setDonneesRH(?string $donneesRH): static
    {
        $this->donneesRH = $donneesRH;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getIndicateurFile()
    {
        return $this->indicateurFile;
    }

    public function setIndicateurFile($indicateurFile): static
    {
        $this->indicateurFile = $indicateurFile;

        return $this;
    }

    public function getRealisationFile(): ?string
    {
        return $this->realisationFile;
    }

    public function setRealisationFile(?string $realisationFile): static
    {
        $this->realisationFile = $realisationFile;

        return $this;
    }

    public function getPerspectiveFile(): ?string
    {
        return $this->perspectiveFile;
    }

    public function setPerspectiveFile(?string $perspectiveFile): static
    {
        $this->perspectiveFile = $perspectiveFile;

        return $this;
    }

    public function getUrlIndex(): ?indexPole
    {
        return $this->urlIndex;
    }

    public function setUrlIndex(indexPole $urlIndex): static
    {
        $this->urlIndex = $urlIndex;

        return $this;
    }
}
