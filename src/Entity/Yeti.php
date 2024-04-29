<?php

namespace App\Entity;

use App\Repository\YetiRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YetiRepository::class)]
class Yeti
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jmeno = null;

    #[ORM\Column]
    private ?int $vyska = null;

    #[ORM\Column]
    private ?int $vaha = null;

    #[ORM\Column(length: 255)]
    private ?string $kozich = null;

    #[ORM\Column(length: 255)]
    private ?string $adresa = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $vytvoreni = null;

    #[ORM\ManyToOne(inversedBy: 'rating')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hodnoceni $hodnoceni = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(string $jmeno): static
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getVyska(): ?int
    {
        return $this->vyska;
    }

    public function setVyska(int $vyska): static
    {
        $this->vyska = $vyska;

        return $this;
    }

    public function getVaha(): ?int
    {
        return $this->vaha;
    }

    public function setVaha(int $vaha): static
    {
        $this->vaha = $vaha;

        return $this;
    }

    public function getKozich(): ?string
    {
        return $this->kozich;
    }

    public function setKozich(string $kozich): static
    {
        $this->kozich = $kozich;

        return $this;
    }

    public function getAdresa(): ?string
    {
        return $this->adresa;
    }

    public function setAdresa(string $adresa): static
    {
        $this->adresa = $adresa;

        return $this;
    }

    public function getVytvoreni(): ?\DateTimeInterface
    {
        return $this->vytvoreni;
    }

    public function setVytvoreni(\DateTimeInterface $vytvoreni): static
    {
        $this->vytvoreni = $vytvoreni;

        return $this;
    }

    public function getHodnoceni(): ?Hodnoceni
    {
        return $this->hodnoceni;
    }

    public function setHodnoceni(?Hodnoceni $hodnoceni): static
    {
        $this->hodnoceni = $hodnoceni;

        return $this;
    }
}
