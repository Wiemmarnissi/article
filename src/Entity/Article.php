<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $discription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $discriptiondetaille  = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }
public function getDiscriptiondetaille(): ?string
    {
        return $this->discriptiondetaille;
    }

    public function setDiscription(string $discription): static
    {
        $this->discription = $discription;

        return $this;
    }
    public function setDiscriptiondetaille(string $discriptiondetaille): static
    {
        $this->discriptiondetaille = $discriptiondetaille;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
