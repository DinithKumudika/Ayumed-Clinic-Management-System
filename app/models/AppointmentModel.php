<?php

class AppointmentModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //TODO : fix viewAll query
    public function viewAll($userId, $currentDate, $currentTime)
    {
        $sql = "SELECT p.ref_no, p.date, p.time 
                  FROM `tbl_appointments` AS a INNER JOIN `tbl_patients` AS p
                  ON a.patient_id = p.id
                  WHERE p.user_id = :id AND a.date > :date AND a.time > :time
                  ORDER BY `created_at` DESC";
        $this->prepare($sql);

        $params = [
            'id' => $userId,
            'date' => $currentDate,
            'time' => $currentTime
        ];

        $appointments = $this->resultSet($params);

        if ($this->rowCount() > 0) {
            return $appointments;
        } else {
            return false;
        }
    }

    //TODO : fix getMostRecent query
    public function getMostRecent($userId, $currentDate, $currentTime)
    {
        $sql = "SELECT p.ref_no, p.date, p.time, a.status 
                 FROM `tbl_appointments` AS a INNER JOIN `tbl_patients` AS p
                 ON a.patient_id = p.id
                 WHERE p.user_id = :user_id AND a.status = :status AND a.date > :date AND a.time > :time
                 ORDER BY `created_at` DESC LIMIT 1";

        $this->prepare($sql);
        $params = [
            'user_id' => $userId,
            'status' => false,
            'date' => $currentDate,
            'time' => $currentTime
        ];
        $appointment = $this->result($params);
        if ($this->rowCount() > 0) {
            return $appointment;
        } else {
            return false;
        }
    }

    public function add($appointmentData, $refNo, $status, $patientId)
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
            'date' => $appointmentData['date'],
            'time' => $appointmentData['time'],
            'reason' => $appointmentData['reason'],
            'status' => $status,
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
}