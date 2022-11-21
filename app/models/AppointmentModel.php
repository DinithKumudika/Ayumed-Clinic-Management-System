<?php

class AppointmentModel extends Database{
     private $db;

     public function __construct()
     {
          $this->db = Database::connect();
     }

     public function viewAll($user_id){
          $sql = "SELECT * FROM `tbl_appointments` WHERE `patient_id` = :id ORDER BY `created_at` DESC";
          $this->prepare($sql);

          $params= [
               'id'=>$user_id
          ];

          $results = $this->resultSet($params);
          return $results;
     }

     public function add($user_id){

     }

     public function cancel(){

     }
}