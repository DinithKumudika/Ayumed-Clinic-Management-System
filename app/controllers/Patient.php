<?php

use utils\Request;
use utils\Generate;
use helpers\Session;

class Patient extends BaseController
{

    public $patientModel;
    public $appointmentModel;

    public function __construct()
    {
        $this->patientModel = $this->model('PatientModel');
        $this->appointmentModel = $this->model('AppointmentModel');
    }

    public function index()
    {
        if (Request::isPost()) {
            Request::removeTags();
            $data = [
                'appointment_date' => trim($_POST['date']),
                'appointment_time' => trim($_POST['time']),
                'appointment_reason' => trim($_POST['reason']),
                'error' => '',
                'success'=>''
            ];
            $appointment = $this->appointmentModel->isTimeTaken($data['appointment_date'], $data['appointment_time']);

            if ($appointment) {
                $data['error'] = "Time slot is not available";
            }
            else {
                $patientId = $this->patientModel->getPatientId(Session::get('user_id'));
                if ($patientId) {
                    $refNo = Generate::refNo($patientId);
                    if($this->appointmentModel->add($data, $refNo, false, $patientId)){
                        $data['success'] = true;
                    }
                }
            }
        }
        else {
            $data = [
                'appointment_date' => '',
                'appointment_time' => '',
                'appointment_reason' => '',
                'error' => '',
                'success'=>''
            ];
        }

        // get all past appointments
        $currDate = Generate::currentDate();
        $currTime = Generate::currentTime();
        $appointments = $this->appointmentModel->viewAll(Session::get('user_id'), $currDate, $currTime);

        if($appointments){
            $data['appointments'] = $appointments;
        }

        //get upcoming appointment
        $upcoming = $this->appointmentModel->getMostRecent(Session::get('user_id'), $currDate, $currTime);
        if ($upcoming) {
            $data['upcoming_no'] = $upcoming->ref_no;
            $data['upcoming_date'] = $upcoming->date;
            $data['upcoming_time'] = $upcoming->time;
        }

        $this->view('pages/patient/index', $data);
    }

    public function error()
    {
        $this->view('404');
    }
}