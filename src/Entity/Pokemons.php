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

    /**
     * @ORM\ManyToMany(targetEntity=Equipes::class, mappedBy="Pkmn1")
     */
    private $equipes;


    public function __construct()
    {
        $this->pokedexs = new ArrayCollection();
        $this->equipes = new ArrayCollection();
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

    /**
     * @return Collection|Equipes[]
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipes $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes[] = $equipe;
            $equipe->addPkmn1($this);
        }

        return $this;
    }

    public function removeEquipe(Equipes $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            $equipe->removePkmn1($this);
        }

        return $this;
    }

}
