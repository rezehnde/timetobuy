<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use \BenMajor\ExchangeRatesAPI\ExchangeRatesAPI;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

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
        $user = $this->getUser();
        $groups = $user->getGroups();

        if (count($groups) == 0) {
            return $this->render('dashboard.html.twig', ['charts' => null]);
        }

        $charts = array();
        foreach ($groups as $group) {
            $currency = $group->getCurrency();

            $lookup = new ExchangeRatesAPI();
            $rates  = $lookup->addDateFrom(date('Y-m-d', strtotime("-3 Months")))
                ->addDateTo(date('Y-m-d'))
                ->addRate($currency)
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

            array_push($charts, array('dates' => $dates, 'values' => $values, 'currency' => $currency));
        }

        return $this->render('dashboard.html.twig', array('charts' => $charts));
    }
}
