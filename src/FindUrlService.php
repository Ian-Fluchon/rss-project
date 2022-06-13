<?php

namespace App\FindUrlService;

use App\Entity\FeedRss;
use Exception;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FindUrlService
{

  public function findUrl(HttpClientInterface $HttpClient)
  {



    return $link = (new FeedRss())->setUrl($url);
  }
}
