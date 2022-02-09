<?php

namespace App\Entity;

use App\Entity\Traits\IsCallable;
use App\Repository\PokedexRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokedexRepository::class)
 */
class Pokedex
{

    use IsCallable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Pokemons::class, mappedBy="pokedexs")
     */
    private $pokemons;

    /**
     * @ORM\OneToMany(targetEntity=JeuxPkmn::class, mappedBy="pokedex")
     */
    private $jeuxPkmns;

    public function __construct()
    {
        $this->pokemons = new ArrayCollection();
        $this->jeuxPkmns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Pokemons[]
     */
    public function getPokemons(): Collection
    {
        return $this->pokemons;
    }

    public function addPokemon(Pokemons $pokemon): self
    {
        if (!$this->pokemons->contains($pokemon)) {
            $this->pokemons[] = $pokemon;
            $pokemon->addPokedex($this);
        }

        return $this;
    }

    public function removePokemon(Pokemons $pokemon): self
    {
        if ($this->pokemons->removeElement($pokemon)) {
            $pokemon->removePokedex($this);
        }

        return $this;
    }

    /**
     * @return Collection|JeuxPkmn[]
     */
    public function getJeuxPkmns(): Collection
    {
        return $this->jeuxPkmns;
    }

    public function addJeuxPkmn(JeuxPkmn $jeuxPkmn): self
    {
        if (!$this->jeuxPkmns->contains($jeuxPkmn)) {
            $this->jeuxPkmns[] = $jeuxPkmn;
            $jeuxPkmn->setPokedex($this);
        }

        return $this;
    }

    public function removeJeuxPkmn(JeuxPkmn $jeuxPkmn): self
    {
        if ($this->jeuxPkmns->removeElement($jeuxPkmn)) {
            // set the owning side to null (unless already changed)
            if ($jeuxPkmn->getPokedex() === $this) {
                $jeuxPkmn->setPokedex(null);
            }
        }

        return $this;
    }
}
