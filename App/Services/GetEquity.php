<?php

namespace App\Services;

use App\Models\Equity;
use App\Repositories\FinanceApi;

class GetEquity
{

    public function execute($searchFor): array
    {
        if ($searchFor != null) {
            $errorMessage = '';
            $stonks = new FinanceApi();
            $quote = $stonks->getQuote($_POST['searchFor']);

            if ($quote != null) {
                $stonk = new Equity(
                    $quote->getSymbol(),
                    $quote->getShortName(),
                    $quote->getMarket(),
                    $quote->getRegularMarketPrice(),
                    $quote->getRegularMarketChange(),
                    $quote->getRegularMarketChangePercent()
                );
            } else {
                $errorMessage = 'not found';
            }
        } else {
            $errorMessage = 'please input data';
        }


        return [$errorMessage, $stonk];
    }


}