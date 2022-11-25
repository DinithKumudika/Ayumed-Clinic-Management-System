<?php

class PatientModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    private function getPatientId($userId){
        $sql = "SELECT `id` FROM `tbl_patients` WHERE `user_id` = : id";
        $this->prepare($sql);
        $params = [
            'id'=>$userId
        ];
        $patientId = $this->result($params);

        if($this->rowCount()>0){
            return $patientId;
        }
        else{
            return false;
        }
    }
}