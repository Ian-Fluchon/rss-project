<?php

namespace App\MessageHandler;

use App\Message\GetActualityLinkMessage;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetActualityLinkHandler implements MessageHandlerInterface
{
    public function __construct(private MessageBusInterface $bus)
    {
    }

    public function __invoke(GetActualityLinkMessage $message)
    {
        // $url = $message->getUrl();
        // $link = $message->getLink();
        // $links = $message->getLinks();
        // $rssLink = $message->getRssLink();
        // $rssLoad = $message->getRssLoad();
    }
}
