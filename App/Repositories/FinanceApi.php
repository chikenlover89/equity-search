<?php

namespace App\Repositories;

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;


class FinanceApi
{
    public function searchItem(string $stonk): array
    {
        $client = ApiClientFactory::createApiClient();
        $searchResult = $client->search($stonk);

        return $searchResult;
    }

    public function getQuote(string $stonk)
    {
        $client = ApiClientFactory::createApiClient();
        $quote = $client->getQuote($stonk);

        return $quote;
    }
}