<?php

namespace App\Entity;

use App\Repository\FeedRssRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedRssRepository::class)]
#[UniqueEntity('url')]
class FeedRss
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $language;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'text', unique : true)]
    private $url;

    #[ORM\OneToOne(mappedBy: 'idFeedRss', targetEntity: WebSite::class, cascade: ['persist', 'remove'])]
    private $webSite;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getWebSite(): ?WebSite
    {
        return $this->webSite;
    }

    public function setWebSite(WebSite $webSite): self
    {
        // set the owning side of the relation if necessary
        if ($webSite->getIdFeedRss() !== $this) {
            $webSite->setIdFeedRss($this);
        }

        $this->webSite = $webSite;

        return $this;
    }

   
}
