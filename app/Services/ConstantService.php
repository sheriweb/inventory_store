<?php

namespace App\Services;

class ConstantService
{


    public static function moneyFormat($money)
    {
       return number_format($money,2);
    }

}
