<?php

use utils\Request;
use utils\Url;
use utils\Flash;
use utils\Generate;
use helpers\Session;

class Patient extends BaseController
{

    public $patientModel;
    public $appointmentModel;

    public function __construct()
    {
        if(!Session::isLoggedIn()){
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login_patient');
        }

        $this->patientModel = $this->model('PatientModel');
        $this->appointmentModel = $this->model('AppointmentModel');
    }

    public function index()
    {
        // get patient id of the currently logged in patient
        $patientId = $this->patientModel->getPatientId(Session::get('user_id'));

        if (Request::isPost()) {
            Request::removeTags();

            $data = [
                'appointment_date' => trim($_POST['date']),
                'appointment_time' => trim($_POST['time']),
                'appointment_reason' => trim($_POST['reason']),
                'error' => '',
                'success'=>''
            ];

            // check whether the given time slot is available or not
            $appointment = $this->appointmentModel->isTimeTaken($data['appointment_date'], $data['appointment_time']);

            if ($appointment) {
                $data['error'] = true;
            }
            else {
                $refNo = Generate::refNo($patientId);
                if($this->appointmentModel->add($data, $refNo, $patientId)){
                    $data['success'] = true;
                }
                else{
                    $data['success'] = false;
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

        $currDate = Generate::currentDate();
        $currTime = Generate::currentTime();

        // get all past appointments
        $appointments = $this->appointmentModel->viewAll($patientId, $currDate, $currTime);

        if($appointments){
            // convert time of each appointment to 12 hours format
            foreach ($appointments as $appointment){
                $appointment->time = Generate::changeTimeFormat($appointment->time, Generate::TIME_FORMAT_12);
            }
            $data['appointments'] = $appointments;
        }

        //get upcoming appointment
        $upcoming = $this->appointmentModel->getMostRecent($patientId, $currDate, $currTime);
        if ($upcoming) {
            $upcoming->time = Generate::changeTimeFormat($upcoming->time, Generate::TIME_FORMAT_12);
            $data['upcoming'] = $upcoming;
        }
        else{
            $data['upcoming'] = "No Appointments";
        }


        $this->view('pages/patient/index', $data);
    }

    public function error()
    {
        $this->view('404');
    }
}