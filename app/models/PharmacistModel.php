<?php

class PharmacistModel extends Database{
     private $db;

     public function __construct()
     {
          $this->db = Database::connect();
     }

     public function getPharmacistId($userId){
          $sql = "SELECT * FROM `tbl_pharmacists` WHERE `user_id` = :id";
          $this->prepare($sql);
          $params = [
              'id'=>$userId
          ];
          $row = $this->result($params);
  
          if($this->rowCount()>0){
              return $row->pharmacist_id;
          }
          else{
              return false;
          }
      }
}