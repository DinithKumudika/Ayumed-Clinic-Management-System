<?php

namespace utils;

abstract class Generate
{

    public const TIME_FORMAT_24 = "24";
    public const TIME_FORMAT_12 = "12";
    public const TIME_ZONE = 'Asia/Colombo';

    public const DATE_TIME_FORMATS = [
        'date' => "Y-m-d",
        'time' => "H:i:s",
        'date_time' => "Y-m-d H:i:s",
        'time_12_hours' => "g:i a",
        'time_24_hours' => "G:i",

    ];

    // generate current date
    public static function currentDate()
    {
        date_default_timezone_set(self::TIME_ZONE);
        return date(self::DATE_TIME_FORMATS['date']);
    }

    // generate current time
    public static function  currentTime()
    {
        date_default_timezone_set(self::TIME_ZONE);
        return date(self::DATE_TIME_FORMATS['time']);
    }

    public static function currentDateTime()
    {
        date_default_timezone_set(self::TIME_ZONE);
        return date(self::DATE_TIME_FORMATS['date_time']);
    }

    // change time format (12 hours/ 24 hours)
    public static function changeTimeFormat($time, $format)
    {
        date_default_timezone_set(self::TIME_ZONE);
        if ($format == self::TIME_FORMAT_12) {
            return date(self::DATE_TIME_FORMATS['time_12_hours'], strtotime($time));
        } else if ($format == self::TIME_FORMAT_24) {
            return date(self::DATE_TIME_FORMATS['time_24_hours'], strtotime($time));
        }
    }

    // get first day of the current month
    public static function firstDayOfCurrMonth(){
        date_default_timezone_set(self::TIME_ZONE);
        $firstDayOfMonth = strtotime('first day of this month');
        return date(self::DATE_TIME_FORMATS['date'], $firstDayOfMonth);
    }

    // change dob to more readable format (ex-: 2022-12-02 to 2022 Dec 02)
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
