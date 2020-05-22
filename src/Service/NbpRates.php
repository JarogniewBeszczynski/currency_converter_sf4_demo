<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class NbpRates
{
    public function fetch()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.nbp.pl/api/exchangerates/rates/C/EUR/');
        $content = $response->getContent();
        $content = $response->toArray();

        return $content['rates'][0]['ask'];
        
    }
}