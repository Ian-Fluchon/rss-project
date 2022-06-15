<?php

namespace App\MessageHandler;

use App\Message\FetchOneUrlMessage;
use App\Message\PersisteUrlMessage;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class FetchOneUrlMessageHandler implements MessageHandlerInterface
{
    

    public function __construct(
        private HttpClientInterface $httpClient,
        private MessageBusInterface $bus
        )
    {

    }

    public function __invoke(FetchOneUrlMessage $message)
    {

        $alpha2languages = $message->getAlpha2languages();
        $alpha2countries = $message->getAlpha2countries();
        $isEnglishExtra = $message->getIsEnglish() ? '-'.$alpha2countries : '';
        $url = "https://news.google.com/rss?hl=" . $alpha2languages.$isEnglishExtra . "&gl=" . $alpha2countries . "&ceid=" . $alpha2countries . ":" . $alpha2languages;
        $response = $this->httpClient->request('GET', $url, [ 
            'max_redirects' => 0 
        ]);

        if ($response->getStatusCode() === 200) {

            $this->bus->dispatch(new PersisteUrlMessage(
                $url, $alpha2languages, $alpha2countries
            ));

            
        }
    }
}
