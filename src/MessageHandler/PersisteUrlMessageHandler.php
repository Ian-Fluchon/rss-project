<?php

namespace App\MessageHandler;

use App\Entity\FeedRss;
use App\Message\PersisteUrlMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class PersisteUrlMessageHandler implements MessageHandlerInterface
{

    public function __construct(
        private EntityManagerInterface $em
    ){}
    public function __invoke(PersisteUrlMessage $message)
    {
        
            $feedRss = new FeedRss();
            $feedRss->setUrl($message->getUrl())
                    ->setLanguage($message->getLanguage())
                    ->setCountry($message->getCountry())
            ;

            try{

                $this->em->persist($feedRss);
                $this->em->flush();
            }catch(UniqueConstraintViolationException $e)
            {}
    }
}
