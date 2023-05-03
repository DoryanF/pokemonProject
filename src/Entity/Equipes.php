<?php

namespace App\Entity;

use App\Repository\EquipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipesRepository::class)
 */
class Equipes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Pokemons::class, inversedBy="equipes")
     */
    private $Pkmn1;

    /**
     * @ORM\ManyToMany(targetEntity=JeuxPkmn::class, inversedBy="equipes")
     */
    private $Jeux;


    public function __construct()
    {
        $this->Pkmn1 = new ArrayCollection();
        $this->Jeux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Pokemons[]
     */
    public function getPkmn1(): Collection
    {
        return $this->Pkmn1;
    }

    public function addPkmn1(Pokemons $pkmn1): self
    {
        if (!$this->Pkmn1->contains($pkmn1)) {
            $this->Pkmn1[] = $pkmn1;
        }

        return $this;
    }

    public function removePkmn1(Pokemons $pkmn1): self
    {
        $this->Pkmn1->removeElement($pkmn1);

        return $this;
    }

    /**
     * @return Collection|JeuxPkmn[]
     */
    public function getJeux(): Collection
    {
        return $this->Jeux;
    }

    public function addJeux(JeuxPkmn $jeux): self
    {
        if (!$this->Jeux->contains($jeux)) {
            $this->Jeux[] = $jeux;
        }

        return $this;
    }

    public function removeJeux(JeuxPkmn $jeux): self
    {
        $this->Jeux->removeElement($jeux);

        return $this;
    }

}