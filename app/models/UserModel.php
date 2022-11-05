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

     public function registerPatient(){

     }

     public function registerStaffMem(){

     }

     public function registerPharmacist(){

     }
}