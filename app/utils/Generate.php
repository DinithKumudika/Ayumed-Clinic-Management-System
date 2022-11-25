<?php
namespace utils;
	abstract class Generate{

		// generate current date
		public static function currentDate(){
			date_default_timezone_set('Asia/Colombo');
			return date("Y-m-d");
		}

        // generate current time
        public static function  currentTime(){
            date_default_timezone_set('Asia/Colombo');
            return date("H:i:s");
        }

        public static function currentDateTime(){
            date_default_timezone_set('Asia/Colombo');
            return date("Y-m-d H:i:s");
        }

		// generate patient registration number
		public static function regNo($user_id){
			$today = self::currentDate();
			return $today . "-" . $user_id;
		}

		// create age of the patient from dob
		public static function age($dob){
			$today = self::currentDate();
			$diff = date_diff(date_create($dob), date_create($today));
			return $diff->format('%y');
		}

        // create OTP code for account verification
		public static function otpCode(){
			return rand(11111,99999);
		}

		public static function authToken(){

        }

        // create appointment no
        public static function refNo($patientId){
            $today = self::currentDate();
            return $today . "-" . $patientId;
        }
	}