<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function date_formate($date) {
    $dd = explode('-', $date);
    $dd_month = $dd[1];
    $month = '';
    switch ($dd_month) {
        case '01':
            $month = 'Jan';
            break;
        case 02:
            $month = 'Feb';
            break;
        case 03:
            $month = 'Mar';
            break;
        case 04:
            $month = 'Apr';
            break;
        case 05:
            $month = 'May';
            break;
        case 06:
            $month = 'Jun';
            break;
        case 07:
            $month = 'July';
            break;
        case 08:
            $month = 'Aug';
            break;
        case 09:
            $month = 'Sep';
            break;
        case 10:
            $month = 'Oct';
            break;
        case 11:
            $month = 'Nov';
            break;
        case 12:
            $month = 'Dec';
            break;
        default :
            $month = $date[1];
    }
//    echo $date[1];
//    echo $month;
    return $dd[0].'-'.$month.'-'.$dd[2];
}

