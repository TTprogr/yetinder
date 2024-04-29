<?php

namespace App\Entity;

use App\Repository\RatingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="yeti::class", inversedBy="ratings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $yeti;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getYeti(): ?Yeti
    {
        return $this->yeti;
    }

    public function setYeti(?Yeti $yeti): self
    {
        $this->yeti = $yeti;
        return $this;
    }
}
