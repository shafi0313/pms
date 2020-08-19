<?php

use Carbon\Carbon;


function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

// if (!function_exists('aarks')) {

//     function aarks($key, $default = '')
//     {
//         return config('aarks.' . $key, $default);
//     }
// }


// if (!function_exists('makeBackendCompatibleDate')) {

//     function makeBackendCompatibleDate($date)
//     {
//         return Carbon::createFromFormat(pms('frontend_date_format'), $date);
//     }
// }
