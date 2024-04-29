<?php

namespace App\Entity;

use App\Repository\HodnoceniRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HodnoceniRepository::class)]
class Hodnoceni
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, yeti>
     */
    #[ORM\OneToMany(targetEntity: yeti::class, mappedBy: 'hodnoceni')]
    private Collection $rating;

    public function __construct()
    {
        $this->rating = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, yeti>
     */
    public function getRating(): Collection
    {
        return $this->rating;
    }

    public function addRating(yeti $rating): static
    {
        if (!$this->rating->contains($rating)) {
            $this->rating->add($rating);
            $rating->setHodnoceni($this);
        }

        return $this;
    }

    public function removeRating(yeti $rating): static
    {
        if ($this->rating->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getHodnoceni() === $this) {
                $rating->setHodnoceni(null);
            }
        }

        return $this;
    }
}
