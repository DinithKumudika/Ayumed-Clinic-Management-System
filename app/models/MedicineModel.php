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
        $sql = "SELECT * FROM tbl_medicines";
        $medicines = $this->query($sql);

        if ($this->rowCount() > 0) {
            return $medicines;
        } 
        else {
            return false;
        }
    }


    public function add($medicineData){  //,$pharmacistId,
 
        $sql = "INSERT INTO `tbl_medicines`(`name`,`weight`,`unit`,`category`,`quantity`) 
                VALUES 
                (
                 :name,
                 :weight,
                 :unit,
                 :category,
                 :quantity
                )";

        $this->prepare($sql);

        $params = [
            'name' => $medicineData['name'],
            'weight' =>$medicineData['weight'],
            'unit' => $medicineData['unit'],
            'category' => $medicineData['category'],
            'quantity' => $medicineData['quantity'],
        ];

        if ($this->execute($params)) {
            return true;
        } 
        else {
            return false;
        }
    }

    public function isMedicineExists($name){
        $sql = "SELECT * FROM `tbl_medicines` WHERE `name` = :user";

        $this->prepare($sql);

        $params = [
             'user'=>$name,
        ];

        $user = $this->result($params);

        if($this->rowCount()>0){
           return true;
        }
        else{
            return false;
        }
    }

    public function cancel()
    {

    }

    
}