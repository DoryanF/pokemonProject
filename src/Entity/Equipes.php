<?php

namespace App\Entity;

use App\Repository\EquipesRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon1_Sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon2_Sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon3_Sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon4_Sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon5_Sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pokemon6_Sprite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemon1(): ?string
    {
        return $this->Pokemon1;
    }

    public function setPokemon1(string $Pokemon1): self
    {
        $this->Pokemon1 = $Pokemon1;

        return $this;
    }

    public function getPokemon2(): ?string
    {
        return $this->Pokemon2;
    }

    public function setPokemon2(string $Pokemon2): self
    {
        $this->Pokemon2 = $Pokemon2;

        return $this;
    }

    public function getPokemon3(): ?string
    {
        return $this->Pokemon3;
    }

    public function setPokemon3(string $Pokemon3): self
    {
        $this->Pokemon3 = $Pokemon3;

        return $this;
    }

    public function getPokemon4(): ?string
    {
        return $this->Pokemon4;
    }

    public function setPokemon4(string $Pokemon4): self
    {
        $this->Pokemon4 = $Pokemon4;

        return $this;
    }

    public function getPokemon5(): ?string
    {
        return $this->Pokemon5;
    }

    public function setPokemon5(string $Pokemon5): self
    {
        $this->Pokemon5 = $Pokemon5;

        return $this;
    }

    public function getPokemon6(): ?string
    {
        return $this->Pokemon6;
    }

    public function setPokemon6(string $Pokemon6): self
    {
        $this->Pokemon6 = $Pokemon6;

        return $this;
    }

    public function getPokemon1Sprite(): ?string
    {
        return $this->Pokemon1_Sprite;
    }

    public function setPokemon1Sprite(string $Pokemon1_Sprite): self
    {
        $this->Pokemon1_Sprite = $Pokemon1_Sprite;

        return $this;
    }

    public function getPokemon2Sprite(): ?string
    {
        return $this->Pokemon2_Sprite;
    }

    public function setPokemon2Sprite(string $Pokemon2_Sprite): self
    {
        $this->Pokemon2_Sprite = $Pokemon2_Sprite;

        return $this;
    }

    public function getPokemon3Sprite(): ?string
    {
        return $this->Pokemon3_Sprite;
    }

    public function setPokemon3Sprite(string $Pokemon3_Sprite): self
    {
        $this->Pokemon3_Sprite = $Pokemon3_Sprite;

        return $this;
    }

    public function getPokemon4Sprite(): ?string
    {
        return $this->Pokemon4_Sprite;
    }

    public function setPokemon4Sprite(string $Pokemon4_Sprite): self
    {
        $this->Pokemon4_Sprite = $Pokemon4_Sprite;

        return $this;
    }

    public function getPokemon5Sprite(): ?string
    {
        return $this->Pokemon5_Sprite;
    }

    public function setPokemon5Sprite(string $Pokemon5_Sprite): self
    {
        $this->Pokemon5_Sprite = $Pokemon5_Sprite;

        return $this;
    }

    public function getPokemon6Sprite(): ?string
    {
        return $this->Pokemon6_Sprite;
    }

    public function setPokemon6Sprite(string $Pokemon6_Sprite): self
    {
        $this->Pokemon6_Sprite = $Pokemon6_Sprite;

        return $this;
    }
}
