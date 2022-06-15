<?php

namespace App\Entity;

use App\Repository\ArticleLinkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleLinkRepository::class)]
class ArticleLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Language;

    #[ORM\Column(type: 'string', length: 255)]
    private $Country;


    #[ORM\OneToOne(inversedBy: 'articleLink', targetEntity: SiteMapRss::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $idSiteMapRss;

    #[ORM\Column(type: 'text')]
    private $urlArticle;

    #[ORM\OneToOne(mappedBy: 'idArticleLink', targetEntity: Articles::class, cascade: ['persist', 'remove'])]
    private $articles;

    public function getId(): ?int
    {
        return $this->id;
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


    public function getIdSiteMapRss(): ?SiteMapRss
    {
        return $this->idSiteMapRss;
    }

    public function setIdSiteMapRss(SiteMapRss $idSiteMapRss): self
    {
        $this->idSiteMapRss = $idSiteMapRss;

        return $this;
    }

    public function getUrlArticle(): ?string
    {
        return $this->urlArticle;
    }

    public function setUrlArticle(string $urlArticle): self
    {
        $this->urlArticle = $urlArticle;

        return $this;
    }

    public function getArticles(): ?Articles
    {
        return $this->articles;
    }

    public function setArticles(Articles $articles): self
    {
        // set the owning side of the relation if necessary
        if ($articles->getIdArticleLink() !== $this) {
            $articles->setIdArticleLink($this);
        }

        $this->articles = $articles;

        return $this;
    }
}
