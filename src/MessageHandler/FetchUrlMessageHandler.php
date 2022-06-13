<?php

namespace App\MessageHandler;

use App\Message\FetchOneUrlMessage;
use App\Message\FetchUrlMessage;
use JetBrains\PhpStorm\Language;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class FetchUrlMessageHandler implements MessageHandlerInterface
{


    public function __construct(private MessageBusInterface $bus)
    {
    }

    public function __invoke(FetchUrlMessage $message)
    {
        $countries = Countries::getNames();
        $languages = Languages::getAlpha3Codes();

        foreach ($countries as $alpha2countries => $country) {
            foreach ($languages as $alpha3Language) {

                try {

                    $alpha2Language = Languages::getAlpha2Code($alpha3Language);
                    $isEnglish = $alpha2Language == "en" ? true : false;
                    $this->bus->dispatch(new FetchOneUrlMessage($alpha2Language, $alpha2countries, $isEnglish));
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
    }
}
