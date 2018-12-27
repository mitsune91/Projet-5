<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Guide", mappedBy="category", orphanRemoval=true)
     */
    private $Guides;

    public function __construct()
    {
        $this->Guides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    /**
     * @return Collection|Guide[]
     */
    public function getGuides(): Collection
    {
        return $this->Guides;
    }

    public function addGuide(Guide $guide): self
    {
        if (!$this->Guides->contains($guide)) {
            $this->Guides[] = $guide;
            $guide->setCategory($this);
        }

        return $this;
    }

    public function removeGuide(Guide $guide): self
    {
        if ($this->Guides->contains($guide)) {
            $this->Guides->removeElement($guide);
            // set the owning side to null (unless already changed)
            if ($guide->getCategory() === $this) {
                $guide->setCategory(null);
            }
        }

        return $this;
    }
}
