<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LieuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:Lieu']],
    denormalizationContext: ['groups' => ['write:Lieu']],
)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?string $image;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?string $localisation = null;

    #[ORM\Column(length: 1020)]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?string $prix = null;

    #[ORM\ManyToOne(inversedBy: 'lieus')]
    #[Groups(["read:Lieu", "write:Lieu"])]
    private ?Ville $Ville = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->Ville;
    }

    public function setVille(?Ville $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

}
