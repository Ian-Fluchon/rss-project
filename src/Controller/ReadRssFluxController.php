<?php

namespace App\Controller;

use App\Entity\FeedRss;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReadRssFluxController extends AbstractController
{
    #[Route('/read', name: 'app_read')]
    public function index(EntityManagerInterface $em): Response
    {

        $url = new FeedRss();
        $link = $em->getRepository(FeedRss::class)->findAll();

        foreach ($link as $url) {

            $rssLink = $url->getUrl();
            dump($rssLink);
            $rssLoad = simplexml_load_file($rssLink);
            $items = [];

            foreach ($rssLoad->channel->item as $link) {
                $items[] = $link->source->attributes();

                $links = implode(" ", $items);
                $links = explode(" ", $links);

                dump($links);
            }
        }




        return $this->render('read_rss_flux/index.html.twig', [
            'controller_name' => 'ReadRssFluxController',
        ]);
    }
}
