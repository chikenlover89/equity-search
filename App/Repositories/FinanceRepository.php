<?php

namespace App\Repositories;

use App\Models\Equity;
use Carbon\Carbon;

class FinanceRepository
{
    public function getAll(): array
    {
        $allEquities = query()
            ->select('*')
            ->from('equity')
            ->execute()
            ->fetchAllAssociative();

        return $allEquities;

    }

    public function storeOne(Equity $equity): void
    {
        query()
            ->insert('equity')
            ->values([
                'symbol' => ':symbol',
                'name' => ':name',
                'market' => ':market',
                'market_price' => ':marketPrice',
                'market_change' => ':marketChange',
                'market_change_percent' => ':marketChangePercent',
            ])
            ->setParameters([
                'symbol' => $equity->getSymbol(),
                'name' => $equity->getName(),
                'market' => $equity->getMarket(),
                'marketPrice' => $equity->getMarketPrice(),
                'marketChange' => $equity->getMarketChange(),
                'marketChangePercent' => $equity->getMarketChangePercent()

            ])
            ->execute();
    }

    public function isStored(string $symbol): bool
    {
        $query = query()
            ->select('*')
            ->from('equity')
            ->where('symbol = :symbol')
            ->setParameter(':symbol', $symbol)
            ->execute()
            ->fetchAssociative();

        if ($query == false) {
            return false;
        }
        return true;
    }

    public function returnStored(string $symbol): array
    {
        $query = query()
            ->select('*')
            ->from('equity')
            ->where('symbol = :symbol')
            ->setParameter(':symbol', $symbol)
            ->execute()
            ->fetchAssociative();

        $storedEquity['equity'] = new Equity($query['symbol'], $query['name'], $query['market'], $query['market_price'], $query['market_change'], $query['market_change_percent'], $query['created_at']);

        if ($query == false) {
            return [];
        }
        return $storedEquity;
    }

    public function updateStored(Equity $equity): void
    {
        query()
            ->update('equity')
            ->set('name', ':name')
            ->set('market', ':market')
            ->set('market_price', ':marketPrice')
            ->set('market_change', ':marketChange')
            ->set('market_change_percent', ':marketChangePercent')
            ->set('created_at', ':createdAt')
            ->where('symbol = :symbol')
            ->setParameter(':symbol', $equity->getSymbol())
            ->setParameter(':name', $equity->getName())
            ->setParameter(':market', $equity->getMarket())
            ->setParameter(':marketPrice', $equity->getMarketPrice())
            ->setParameter(':marketChange', $equity->getMarketChange())
            ->setParameter(':marketChangePercent', $equity->getMarketChangePercent())
            ->setParameter(':createdAt', Carbon::now())
            ->execute();


    }


}