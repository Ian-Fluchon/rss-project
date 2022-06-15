<?php

namespace App\Entity;

use App\Repository\SiteMapRssRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteMapRssRepository::class)]
class SiteMapRss
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $urlSiteMap;

    #[ORM\Column(type: 'text', nullable: true)]
    private $urlRss;

    #[ORM\Column(type: 'string', length: 40)]
    private $language;

    #[ORM\Column(type: 'string', length: 40)]
    private $country;

    #[ORM\OneToOne(inversedBy: 'siteMapRss', targetEntity: WebSite::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $idSiteWeb;

    #[ORM\OneToOne(mappedBy: 'idSiteMapRss', targetEntity: ArticleLink::class, cascade: ['persist', 'remove'])]
    private $articleLink;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlSiteMap(): ?string
    {
        return $this->urlSiteMap;
    }

    public function setUrlSiteMap(?string $urlSiteMap): self
    {
        $this->urlSiteMap = $urlSiteMap;

        return $this;
    }

    public function getUrlRss(): ?string
    {
        return $this->urlRss;
    }

    public function setUrlRss(?string $urlRss): self
    {
        $this->urlRss = $urlRss;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $Language): self
    {
        $this->language = $Language;

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

    public function getIdSiteWeb(): ?WebSite
    {
        return $this->idSiteWeb;
    }

    public function setIdSiteWeb(WebSite $idSiteWeb): self
    {
        $this->idSiteWeb = $idSiteWeb;

        return $this;
    }

    public function getArticleLink(): ?ArticleLink
    {
        return $this->articleLink;
    }

    public function setArticleLink(ArticleLink $articleLink): self
    {
        // set the owning side of the relation if necessary
        if ($articleLink->getIdSiteMapRss() !== $this) {
            $articleLink->setIdSiteMapRss($this);
        }

        $this->articleLink = $articleLink;

        return $this;
    }
}
