<?php

namespace App\MessageHandler;

use App\Entity\FeedRss;
use App\Message\GetActualityLinkMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetActualityLinkHandler implements MessageHandlerInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    ) {
    }

    public function __invoke(GetActualityLinkMessage $message)
    {

        $url = new FeedRss();
        $link = $this->em->getRepository(FeedRss::class)->findAll();

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

    }
}
