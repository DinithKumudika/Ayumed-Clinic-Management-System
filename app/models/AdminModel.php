<?php
use utils\Generate;

class AdminModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getMonthlyAppointments($last_month){
        $sql = "SELECT * FROM `tbl_appointments` WHERE `created_at` > :date1 AND `created_at` < :date2 ";
        $this->prepare($sql);

        $params = [

        ];
    }
}