<?php

namespace App\Entity;

use App\Entity\Traits\IsCallable;
use App\Repository\JeuxPkmnRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass=JeuxPkmnRepository::class)
 *
 */
class JeuxPkmn
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $img;

    /**
     * @ORM\ManyToOne(targetEntity=Pokedex::class, inversedBy="jeuxPkmns")
     */
    private $pokedex;

    /**
     * @ORM\ManyToMany(targetEntity=Equipes::class, mappedBy="Jeux")
     */
    private $equipes;



    public function __construct()
    {
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getPokedex(): ?Pokedex
    {
        return $this->pokedex;
    }

    public function setPokedex(?Pokedex $pokedex): self
    {
        $this->pokedex = $pokedex;

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
            $equipe->addJeux($this);
        }

        return $this;
    }

    public function removeEquipe(Equipes $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            $equipe->removeJeux($this);
        }

        return $this;
    }

}