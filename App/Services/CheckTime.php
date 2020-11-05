<?php

namespace App\Services;

use Carbon\Carbon;

class CheckTime
{
    public static function passed10mins(string $storedTime): bool
    {
        $passed = Carbon::parse($storedTime)->floatDiffInSeconds(Carbon::now());

        if (($passed / 60) > 10) {
            return true;
        }

        return false;
    }
}