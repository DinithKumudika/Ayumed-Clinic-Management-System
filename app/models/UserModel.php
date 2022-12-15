<?php
use utils\Crypto;
use utils\Token;

class UserModel extends Database{
     private $db;

     public function __construct()
     {
          $this->db = Database::connect();
     }

     public function login($username, $password){
         if($this->isUserExists($username)){
             $sql = "SELECT `password` FROM `tbl_users` WHERE `username` = :user";

             $this->prepare($sql);

             $params = [
                 'user'=>$username
             ];

             $row = $this->result($params);

             if(Crypto::verifyHash($row->password, $password)){
                 return true;
             }
             else{
                 return false;
             }
         }
         else {
             return false;
         }
     }

     public function register($data, $roleId){
          $sql = "INSERT INTO `tbl_users`(`first_name`,`last_name`,`email`,`username`,`password`,`avatar`,`role_id`) 
                    VALUES (
                        :first_name, 
                        :last_name, 
                        :email, 
                        :username, 
                        :password,
                        :avatar_url,
                        :role_id
                    )";

          $this->prepare($sql);

          $params = [
               'first_name'=>$data['first_name'],
               'last_name'=>$data['last_name'],
               'email'=>$data['email'],
               'username'=>$data['username'],
               'password'=>$data['password'],
               'avatar_url'=>URL_ROOT. "/images/profile.jpg",
               'role_id'=>$roleId
          ];

          if($this->execute($params)){
              return true;
          }
          else{
              return  false;
          }
     }

     public function getUser($username){
         $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user";

         $this->prepare($sql);

         $params = [
             'user'=>$username,
         ];

         $user = $this->result($params);

         if($this->rowCount()>0){
             return $user;
         }
         else{
             return false;
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

     public function registerPatient($data, $age, $regNo, $code, $user_id){
          $sql = "INSERT INTO `tbl_patients`(`NIC`,`DOB`,`age`,`gender`,`phone_no`,`address`,`martial_status`,`reg_no`, 
                    `otp_code`, `verification_status`, `user_id`) 
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
                         :verification_status,
                         :user_id
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
               'verification_status'=>false,
              'user_id'=>$user_id
          ];

          if($this->execute($params)){
              return true;
          }
          else{
              return  false;
          }
     }

    //A temporary table. Just for the interim presentation.
    public function registerDoctor($data, $user_id)
    {
        $sql = "INSERT INTO `tbl_doctors`(`NIC`,`phone_no`,`user_id`) 
        VALUES (
             :nic,
             :phone_no,
             :user_id
        )";

        $this->prepare($sql);

        $params = [
            'nic' => $data['nic'],
            'phone_no' => $data['phone'],
            'user_id' => $user_id
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return  false;
        }
    }

     public function registerStaff($staff_no, $user_id){
         $sql = "INSERT INTO `tbl_staff`(`staff_reg_no`,`status`,`user_id`) 
        VALUES (
             :staff_reg_no,
             :status,
             :user_id
        )";

         $this->prepare($sql);

         $params = [
             'staff_reg_no' => $staff_no,
             'status' => NULL,
             'user_id' => $user_id
         ];

         if ($this->execute($params)) {
             return true;
         } else {
             return  false;
         }
     }

     public function registerPharmacist(){

     }

     public function getUserId($role_id){
          $sql = "SELECT * FROM `tbl_users` WHERE `role_id` = :role_id ORDER BY `user_id` DESC LIMIT 1";
          $this->prepare($sql);

          $params = [
               'role_id'=>$role_id,
          ];

          $user = $this->result($params);

          if($this->rowCount()>0){
              return $user->user_id;
          }
          else{
              return  false;
          }
     }

     public function getAvatar($user_id){
         $sql = "SELECT `avatar` FROM `tbl_users` WHERE `user_id` = :id";
         $this->prepare($sql);

         $params = [
             'id'=>$user_id
         ];

         $avatar_url = $this->result($params);

         if($this->rowCount()>0){
             return $avatar_url->avatar;
         }
         else{
             return false;
         }
     }
}