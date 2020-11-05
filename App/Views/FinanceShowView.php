<h3>STONK SEARCHER 2000</h3>

<form method="post" action="/search">
    <input type="text" name="searchFor">
    <button type="submit">Search</button>
</form>

<?php if ($stonk != null): ?>

    <h3><?= $stonk->getSymbol() . " / " ?><?= $stonk->getName() . " / " ?><?= strtoupper(str_replace("_", " ", $stonk->getMarket())) . " " ?></h3>
    <p><?= $stonk->getMarketPrice() . "USD / " ?><?= $stonk->getMarketChange() . " / " ?><?= $stonk->getMarketChangePercent() . "% " ?></p>
    <p><?= $stonk->getCreatedAt() ?></p>

<?php endif; ?>


<?php
echo $errorMessage;
?>