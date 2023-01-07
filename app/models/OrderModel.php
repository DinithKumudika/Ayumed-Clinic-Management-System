<?php

class MedicineModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function viewAll($userId)
    {
        $sql = "SELECT * FROM tbl_orders";
        $orders = $this->query($sql);

        if ($this->rowCount() > 0) {
            return $orders;
        } 
        else {
            return false;
        }
    }

}