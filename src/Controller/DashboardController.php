<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DashboardController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/dashboard")
     */
    public function page(): Response
    {
        $response = $this->client->request(
            'GET',
            'https://api.exchangeratesapi.io/history?start_at=2020-01-01&end_at=2020-06-30&base=EUR&symbols=USD'
        );

        $rates = [];
        $statusCode = $response->getStatusCode();
        $content = $response->toArray();

        return $this->render('dashboard.html.twig', ['content' => $content]);
    }
}
