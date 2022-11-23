<?php

class VerificationModel extends Database{
     private $db;

     public function __construct()
     {
          $this->db = Database::connect();
     }

     public function verifyOTP($otp){
          $sql = "SELECT * FROM `tbl_patients` WHERE `otp_code` = :otp";
          $this->prepare($sql);
          $params = [
               'otp'=>$otp
          ];
          $patient = $this->result($params);
          if($this->rowCount()>0){
               return $patient;
          }
          else{
               return false;
          }
     }

     public function verify($patient_id){
          $sql = "UPDATE `tbl_patients` SET `otp_code` = :otp AND `verification_status` = :status WHERE `id` = :id";
          $this->prepare($sql);
          $params = [
               'otp'=>'NULL',
               'status'=>1,
               'id'=>$patient_id
          ];

          if($this->execute($params)){
              return true;
          }
          else{
              return false;
          }
     }
}