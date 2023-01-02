<?php

class DoctorModel extends Database{
     private $db;

     public function __construct()
     {
          $this->db = Database::connect();
     }

     public function add($data, $user_id){
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
}