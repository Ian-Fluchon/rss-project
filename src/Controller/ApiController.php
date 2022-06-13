<?php

namespace App\Controller;

use App\Message\FetchUrlMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(MessageBusInterface $bus): Response
    {

        $bus->dispatch(new FetchUrlMessage());
        
        return $this->redirectToRoute('app_home');


        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
