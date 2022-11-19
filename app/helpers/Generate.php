<?php

	abstract class Generate{

		// generate current date
		public static function currentDate(){
			date_default_timezone_set('Asia/Colombo');
			$date = date("Y-m-d");
			return $date;
		}

		// generate patient registration number
		public static function regNo($user_id){
			$today = self::currentDate();
			return $today . "-" . $user_id;
		}

		// create age of the patient from dob
		public static function age($dob){
			$today = date("Y-m-d");
          	$diff = date_diff(date_create($dob), date_create($today));
          	return $diff->format('%y');
		}

		public static function otpCode(){
			
		}

		// create verification code for account verification
		public static function verificationCode($email){
			return sha1($email . time());
		}
	}