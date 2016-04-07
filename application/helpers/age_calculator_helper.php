<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('compute_age'))
{
    function compute_age($birthdate, $cur_date = '')
    {
        if (empty($cur_date))
            $cur_date = date('m/d/Y');

        $birthdate = date('m/d/Y', strtotime($birthdate));
        $daynum_now = date('z', strtotime($cur_date));
        $daynum_birth = date('z', strtotime($birthdate));

        $birth = (!empty($birthdate)) ? explode('/',$birthdate) : explode('/','//');

        $birthmonth = $birth[0];

        $birthyear = $birth[2];

        $cur_date = explode('/', $cur_date);
        $cyear = $cur_date[2] - 1;
        $cmonth = $cur_date[0];

        $t1 = $cyear - $birthyear;
        $t2 = (12 - $birthmonth) + $cmonth;
        $t3 = $t2/12;
        $age1 = $t1 + $t3;

        $age = round($age1, 0, PHP_ROUND_HALF_DOWN);
        $age = ($daynum_birth <= $daynum_now) ? $age : $age - 1;
        return $age;
    }  
}