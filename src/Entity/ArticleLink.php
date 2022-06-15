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

    #[ORM\OneToOne(inversedBy: 'articleLink', targetEntity: Articles::class, cascade: ['persist', 'remove'])]
    private $ArticleUrl;

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

    public function getArticleUrl(): ?Articles
    {
        return $this->ArticleUrl;
    }

    public function setArticleUrl(?Articles $ArticleUrl): self
    {
        $this->ArticleUrl = $ArticleUrl;

        return $this;
    }
}
