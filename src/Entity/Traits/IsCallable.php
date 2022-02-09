<?php

namespace App\Entity\Traits;

trait IsCallable
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Api_Url;

    public function getApiUrl(): ?string
    {
        return $this->Api_Url;
    }

    public function setApiUrl(string $Api_Url): self
    {
        $this->Api_Url = $Api_Url;

        return $this;
    }
}