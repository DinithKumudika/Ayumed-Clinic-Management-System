<?php

class PatientModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getPatientId($userId){
        $sql = "SELECT * FROM `tbl_patients` WHERE `user_id` = :id";
        $this->prepare($sql);
        $params = [
            'id'=>$userId
        ];
        $row = $this->result($params);

        if($this->rowCount()>0){
            return $row->id;
        }
        else{
            return false;
        }
    }
}