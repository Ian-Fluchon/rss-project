<?php

namespace App\Controller;

use App\Entity\FeedRss;
use App\Message\GetActualityLinkMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReadRssFluxController extends AbstractController
{
    #[Route('/read', name: 'app_read')]
    public function index(MessageBusInterface $bus): Response
    {

        $bus->dispatch(new GetActualityLinkMessage());

        return $this->redirectToRoute('app_home');

        return $this->render('read_rss_flux/index.html.twig', [
            'controller_name' => 'ReadRssFluxController',
        ]);
    }
}
