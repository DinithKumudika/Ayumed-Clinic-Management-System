<?php

class UserModel extends Database{
     private $db;

     public function __construct()
     {
          $this->db = Database::connect();
     }

     public function login($username, $password){
          $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user AND `password` = :pass";
          
          $this->prepare($sql);
          $params = [
               'user'=>$username,
               'pass'=>$password
          ];
          $user = $this->result($params);

          if($this->rowCount()>0){
               return $user;
          }
          else{
               return false;
          }
     }

     public function register($data, $roleId){
          $sql = "INSERT INTO `tbl_users`(`first_name`,`last_name`,`email`,`username`,`password`,`role_id`) 
                    VALUES (
                        :first_name, 
                        :last_name, 
                        :email, 
                        :username, 
                        :password, 
                        :role_id
                    )";

          $this->prepare($sql);

          $params = [
               'first_name'=>$data['first_name'],
               'last_name'=>$data['last_name'],
               'email'=>$data['email'],
               'username'=>$data['username'],
               'password'=>$data['password'],
               'role_id'=>$roleId
          ];

          if($this->execute($params)){
              return true;
          }
          else{
              return  false;
          }
     }

     public function isUserExists($username){
          $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user";

          $this->prepare($sql);

          $params = [
               'user'=>$username,
          ];

          $user = $this->result($params);

          if($this->rowCount()>0){
             return true;
          }
          else{
              return false;
          }
     }

     public function registerPatient($data, $age, $regNo, $code){
          $sql = "INSERT INTO `tbl_patients`(`NIC`,`DOB`,`age`,`gender`,`phone_no`,`address`,`martial_status`,`reg_no`, 
                    `otp_code`, `verification_status`) 
                    VALUES (
                         :nic,
                         :dob,
                         :age,
                         :gender,
                         :phone_no,
                         :address,
                         :martial_status,
                         :reg_no,
                         :otp_code,
                         :verification_status
                    )";

          $this->prepare($sql);

          $params = [
               'nic'=>$data['nic'],
               'dob'=>$data['dob'],
               'age'=> $age,
               'gender'=>$data['gender'],
               'phone_no'=>$data['phone'],
               'address'=>$data['address'],
               'martial_status'=>$data['martial-status'],
               'reg_no'=> $regNo,
               'otp_code'=>$code,
               'verification_status'=>false
          ];

          if($this->execute($params)){
              return true;
          }
          else{
              return  false;
          }
     }

     public function registerStaffMem(){

     }

     public function registerPharmacist(){

     }

     public function getUserId(){
          $sql = "SELECT * FROM `tbl_users` WHERE `role_id` = :role_id ORDER BY `user_id` DESC LIMIT 1";
          $this->prepare($sql);

          $params = [
               'role_id'=>1,
          ];

          $user = $this->result($params);
          return $user->user_id;
     }
}