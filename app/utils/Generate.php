<?php

namespace utils;

abstract class Generate
{

    public const TIME_FORMAT_24 = "24";
    public const TIME_FORMAT_12 = "12";

    // generate current date
    public static function currentDate()
    {
        date_default_timezone_set('Asia/Colombo');
        return date("Y-m-d");
    }

    // generate current time
    public static function  currentTime()
    {
        date_default_timezone_set('Asia/Colombo');
        return date("H:i:s");
    }

    public static function currentDateTime()
    {
        date_default_timezone_set('Asia/Colombo');
        return date("Y-m-d H:i:s");
    }

    // change time format (12 hours/ 24 hours)
    public static function changeTimeFormat($time, $format)
    {
        date_default_timezone_set('Asia/Colombo');
        if ($format == self::TIME_FORMAT_12) {
            return date("g:i a", strtotime($time));
        } else if ($format == self::TIME_FORMAT_24) {
            return date("G:i", strtotime($time));
        }
    }

    public static function changeDOBFormat($dob)
    {
        $arr = explode('-', $dob);

        $month_arr = [
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec'
        ];

        $year = $arr[0];
        $month = $arr[1];
        $date = $arr[2];

        $month = $month_arr[$month];

        return $year . ' ' . $month . ' ' . $date;
    }

    // generate patient registration number
    public static function regNo($user_id)
    {
        $today = self::currentDate();
        return $today . "-" . $user_id;
    }

    // create age of the patient from dob
    public static function age($dob)
    {
        $today = self::currentDate();
        $diff = date_diff(date_create($dob), date_create($today));
        return $diff->format('%y');
    }

    // create OTP code for account verification
    public static function otpCode()
    {
        return rand(11111, 99999);
    }

    // create appointment no
    public static function refNo($patientId)
    {
        $today = self::currentDate();
        $time = self::currentTime();
        $arr = explode(":", $time);
        return $today . "-" . $arr[0] . $arr[1] . $patientId;
    }
}
