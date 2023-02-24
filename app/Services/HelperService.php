<?php

namespace App\Services;

class HelperService
{

    public static function frontEndDateFormat($date): string
    {
        return date('d M Y',strtotime($date));
    }

}
