<?php

namespace App\Models;

class Equity
{
    private string $symbol;
    private ?string $name;
    private ?string $market;

    private ?string $marketPrice;
    private ?string $marketChange;
    private ?string $marketChangePercent;

    private ?string $createdAt;


    public function __construct(
        string $symbol,
        ?string $name,
        ?string $market,
        ?string $marketPrice,
        ?string $marketChange,
        ?string $marketChangePercent,
        ?string $createdAt = null
    )
    {
        $this->symbol = $symbol;
        $this->name = $name;
        $this->market = $market;
        $this->marketPrice = $marketPrice;
        $this->marketChange = $marketChange;
        $this->marketChangePercent = $marketChangePercent;
        $this->createdAt = $createdAt;
    }

    /**
     * @param string $name
     */
    public
    function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public
    function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public
    function getMarket(): ?string
    {
        return $this->market;
    }

    /**
     * @return string
     */
    public
    function getMarketChange(): ?string
    {
        return $this->marketChange;
    }

    /**
     * @return string
     */
    public
    function getMarketChangePercent(): ?string
    {
        return $this->marketChangePercent;
    }

    /**
     * @return string
     */
    public
    function getMarketPrice(): ?string
    {
        return $this->marketPrice;
    }

    /**
     * @return string
     */
    public
    function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param string $market
     */
    public
    function setMarket(string $market): void
    {
        $this->market = $market;
    }

    /**
     * @param string $marketChange
     */
    public
    function setMarketChange(string $marketChange): void
    {
        $this->marketChange = $marketChange;
    }

    /**
     * @param string $marketChangePercent
     */
    public
    function setMarketChangePercent(string $marketChangePercent): void
    {
        $this->marketChangePercent = $marketChangePercent;
    }

    /**
     * @param string $marketPrice
     */
    public
    function setMarketPrice(string $marketPrice): void
    {
        $this->marketPrice = $marketPrice;
    }

    /**
     * @param string $symbol
     */
    public
    function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param string|null $createdAt
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

}