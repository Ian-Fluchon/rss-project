<?php

namespace App\Entity;

use App\Repository\WebSiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebSiteRepository::class)]
class WebSite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $WebSiteUrl;

    #[ORM\Column(type: 'string', length: 255)]
    private $Language;

    #[ORM\Column(type: 'string', length: 255)]
    private $Country;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;


    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getWebSiteUrl(): ?string
    {
        return $this->WebSiteUrl;
    }

    public function setWebSiteUrl(string $WebSiteUrl): self
    {
        $this->WebSiteUrl = $WebSiteUrl;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->Language;
    }

    public function setLanguage(string $Language): self
    {
        $this->Language = $Language;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

  
}
