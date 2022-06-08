<?php

use Carbon\Carbon;

const TYPE_DATE_DEFAULT = 'DEFAULT';
// format des mountants
function getForrmattedAmount($amount,$currency){
    return  rtrim(rtrim(number_format($amount,2, ',', ' '),'0'),',').' '.$currency;
}

// format des mountants
function getForrmattedDate($date,$type = TYPE_DATE_DEFAULT){
    switch ($type) {
        default:
            return Carbon::parse($date)->format('d/m/Y');
            break;
    }
}

// récuprer les valeurs de tabelau constants
function constants($key)
{
    return config('constants.' . $key);
}

