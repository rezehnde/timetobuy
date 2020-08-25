<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use \BenMajor\ExchangeRatesAPI\ExchangeRatesAPI;
use Symfony\Component\HttpFoundation\Response;

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
        $lookup = new ExchangeRatesAPI();
        $rates  = $lookup->addDateFrom(date('Y-m-d', strtotime("-3 Months")))
            ->addDateTo(date('Y-m-d'))
            ->addRate('USD')
            ->setBaseCurrency('EUR')
            ->fetch()
            ->getRates();

        ksort($rates);

        $dates = [];
        $values = [];
        foreach ($rates as $date => $rate) {
            array_push($dates, "'".$date."'");
            foreach ($rate as $currency => $value) {
                array_push($values, $value);
            }
        }

        return $this->render('dashboard.html.twig', ['dates' => $dates, 'values' => $values, 'currency' => 'USD']);
    }
}
