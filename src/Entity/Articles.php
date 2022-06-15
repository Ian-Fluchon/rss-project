<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ArticleTitle;

    #[ORM\Column(type: 'string', length: 255)]
    private $ArticleLanguage;

    #[ORM\Column(type: 'string', length: 255)]
    private $ArticleCountry;

    #[ORM\Column(type: 'string', length: 255)]
    private $Category;

    #[ORM\Column(type: 'array', nullable: true)]
    private $Keywords = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Author;

    #[ORM\Column(type: 'text')]
    private $Content;

    #[ORM\Column(type: 'string', length: 255)]
    private $PrimarySiteName;

    #[ORM\Column(type: 'string', length: 255)]
    private $PrimarySiteUrl;

    #[ORM\Column(type: 'datetime')]
    private $CreationDate;

    #[ORM\OneToOne(inversedBy: 'articles', targetEntity: ArticleLink::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $idArticleLink;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->ArticleTitle;
    }

    public function setArticleTitle(string $ArticleTitle): self
    {
        $this->ArticleTitle = $ArticleTitle;

        return $this;
    }

    public function getArticleLanguage(): ?string
    {
        return $this->ArticleLanguage;
    }

    public function setArticleLanguage(string $ArticleLanguage): self
    {
        $this->ArticleLanguage = $ArticleLanguage;

        return $this;
    }

    public function getArticleCountry(): ?string
    {
        return $this->ArticleCountry;
    }

    public function setArticleCountry(string $ArticleCountry): self
    {
        $this->ArticleCountry = $ArticleCountry;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getKeywords(): ?array
    {
        return $this->Keywords;
    }

    public function setKeywords(?array $Keywords): self
    {
        $this->Keywords = $Keywords;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->Author;
    }

    public function setAuthor(?string $Author): self
    {
        $this->Author = $Author;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getPrimarySiteName(): ?string
    {
        return $this->PrimarySiteName;
    }

    public function setPrimarySiteName(string $PrimarySiteName): self
    {
        $this->PrimarySiteName = $PrimarySiteName;

        return $this;
    }

    public function getPrimarySiteUrl(): ?string
    {
        return $this->PrimarySiteUrl;
    }

    public function setPrimarySiteUrl(string $PrimarySiteUrl): self
    {
        $this->PrimarySiteUrl = $PrimarySiteUrl;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->CreationDate;
    }

    public function setCreationDate(\DateTimeInterface $CreationDate): self
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }

    public function getIdArticleLink(): ?ArticleLink
    {
        return $this->idArticleLink;
    }

    public function setIdArticleLink(ArticleLink $idArticleLink): self
    {
        $this->idArticleLink = $idArticleLink;

        return $this;
    }

}
