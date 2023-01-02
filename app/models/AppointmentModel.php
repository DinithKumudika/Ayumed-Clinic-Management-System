<?php

class AppointmentModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllPast($userId, $currentDate, $currentTime)
    {
        $sql = "SELECT *
                FROM `tbl_appointments`
                WHERE `patient_id` = :id AND (`date` < :date_1 OR (`date` = :date_2 AND `time` < :time)) 
                ORDER BY `created_at` DESC";
        $this->prepare($sql);
        $params = [
            'id' => $userId,
            'date_1' => $currentDate,
            'date_2' => $currentDate,
            'time' => $currentTime
        ];

        $appointments = $this->resultSet($params);

        if ($this->rowCount() > 0) {
            return $appointments;
        } else {
            return false;
        }
    }

    public function getMostRecent($patientId, $currentDate, $currentTime)
    {
        $sql = "SELECT *
                FROM `tbl_appointments`
                WHERE (`patient_id` = :id AND `status` = :status) AND (`date` > :date_1 OR (`date` = :date_2 AND `time` > :time)) 
                ORDER BY `created_at` ASC LIMIT 1";

        $this->prepare($sql);

        $params = [
            'id' => $patientId,
            'status' => false,
            'date_1' => $currentDate,
            'date_2' => $currentDate,
            'time' => $currentTime
        ];

        $appointment = $this->result($params);

        if ($this->rowCount() > 0) {
            return $appointment;
        } else {
            return false;
        }
    }

    public function getAllUpcoming($patientId, $currentDate, $currentTime){
        $sql = "SELECT *
                FROM `tbl_appointments`
                WHERE (`patient_id` = :id AND `status` = :status) AND (`date` > :date_1 OR (`date` = :date_2 AND `time` > :time)) 
                ORDER BY `created_at` ASC";

        $this->prepare($sql);

        $params = [
            'id' => $patientId,
            'status' => false,
            'date_1' => $currentDate,
            'date_2' => $currentDate,
            'time' => $currentTime
        ];

        $appointments = $this->resultSet($params);

        if ($this->rowCount() > 0) {
            return $appointments;
        } else {
            return false;
        }
    }

    public function add($appointmentData, $refNo, $patientId)
    {
        $sql = "INSERT INTO `tbl_appointments`(`ref_no`,`date`,`time`,`reason`,`status`,`patient_id`) 
                VALUES 
                (
                :ref_no,
                :date,
                :time,
                :reason,
                :status,
                :patient_id
                )";

        $this->prepare($sql);

        $params = [
            'ref_no' => $refNo,
            'date' => $appointmentData['appointment_date'],
            'time' => $appointmentData['appointment_time'],
            'reason' => $appointmentData['appointment_reason'],
            'status' => false,
            'patient_id' => $patientId
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return false;
        }
    }

    public function cancel()
    {

    }

    public function isTimeTaken($date, $time)
    {
        $sql = "SELECT * FROM `tbl_appointments` WHERE `date`= :date AND `time` = :time LIMIT 1";
        $this->prepare($sql);
        $params = [
            'date' => $date,
            'time' => $time
        ];
        $appointment = $this->result($params);

        if ($this->rowCount() > 0) {
            return $appointment;
        } else {
            return false;
        }
    }

    // get no of all appointments
    public function getCount(){
        $sql = "SELECT * FROM `tbl_appointments`";
        $this->queryAll($sql);

        return $this->rowCount();
    }

    // get all the appointments made in a day
    public function getDailyCount(){

    }
}