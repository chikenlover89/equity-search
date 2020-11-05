<?php

namespace App\Controllers;

use App\Models\Equity;
use App\Repositories\FinanceApi;
use App\Repositories\FinanceRepository;
use App\Services\CheckTime;
use App\Services\GetEquity;


class FinanceController
{
    public function index()
    {


        return require_once __DIR__ . '/../Views/FinanceShowView.php';
    }

    public function search()
    {
        $repository = new FinanceRepository();

        // Stonk is found in rep
        if ($repository->isStored($_POST['searchFor'])) {
            $stonk = $repository->returnStored($_POST['searchFor'])['equity'];

            if (CheckTime::passed10mins($stonk->getCreatedAt())) {

                $getEquity = new GetEquity();
                $response = $getEquity->execute($_POST['searchFor']);
                $errorMessage = $response[0];
                $stonk = $response[1];

                if ($stonk != null) {
                    $repository->updateStored($stonk);
                }

            }

            // Stonk is not found in rep
        } else {

            $getEquity = new GetEquity();
            $response = $getEquity->execute($_POST['searchFor']);
            $errorMessage = $response[0];
            $stonk = $response[1];

            if ($stonk != null) {
                $repository->storeOne($stonk);
            }

        }


        /*
        $getEquity = new GetEquity();
        $response = $getEquity->execute($_POST['searchFor']);
        $errorMessage = $response[0];
        $stonk = $response[1];


        if($stonk !=null) {
            if (!$repository->isStored($stonk)) {
                $repository->storeOne($stonk);
            }
        }
        */

        return require_once __DIR__ . '/../Views/FinanceShowView.php';
        //header('Location: /');
    }
}