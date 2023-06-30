<?php

namespace App\Entity;

use App\Entity\Traits\IsCallable;
use App\Repository\PokemonsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonsRepository::class)
 */
class Pokemons
{

    use IsCallable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Pokedex::class, inversedBy="pokemons")
     */
    private $pokedexs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sprites;




    public function __construct()
    {
        $this->pokedexs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Pokedex[]
     */
    public function getPokedexs(): Collection
    {
        return $this->pokedexs;
    }

    public function addPokedex(Pokedex $pokedex): self
    {
        if (!$this->pokedexs->contains($pokedex)) {
            $this->pokedexs[] = $pokedex;
        }

        return $this;
    }

    public function removePokedex(Pokedex $pokedex): self
    {
        $this->pokedexs->removeElement($pokedex);

        return $this;
    }

    public function getSprites(): ?string
    {
        return $this->sprites;
    }

    public function setSprites(?string $sprites): self
    {
        $this->sprites = $sprites;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
