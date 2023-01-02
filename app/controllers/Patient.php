<?php

use utils\Request;
use utils\Response;
use utils\Url;
use utils\Flash;
use utils\Generate;
use helpers\Session;

class Patient extends BaseController
{

    private $rememberLoginModel;
    private $patientModel;
    private $appointmentModel;

    public function __construct()
    {
        $this->rememberLoginModel = $this->model('RememberLoginModel');

        if(!Session::isLoggedIn()){
            Url::rememberRequestedPage();
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login/patient');
        }
        else{
            $this->patientModel = $this->model('PatientModel');
            $this->appointmentModel = $this->model('AppointmentModel');
        }
    }

    public function index()
    {
        // get patient id of the currently logged in patient
        $patientId = $this->patientModel->getPatientId(Session::get('user_id'));

        if (Request::isPost()) {
            Request::removeTags();

            $data = [
                'appointment_date' => date("Y-m-d", strtotime(trim($_POST['date']))),
                'appointment_time' => date("H:i:s", strtotime(trim($_POST['time']))),
                'appointment_reason' => trim($_POST['reason']),
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
        $appointments = $this->appointmentModel->getAllPast($patientId, $currDate, $currTime);

        // get all upcoming appointments
//        $upcomingAppointments = $this->appointmentModel->getAllUpcoming($patientId, $currDate, $currTime);

        if($appointments){
            // convert time of each appointment to 12 hours format
            foreach ($appointments as $appointment){
                $appointment->time = Generate::changeTimeFormat($appointment->time, Generate::TIME_FORMAT_12);
            }
            $data['appointments'] = $appointments;
        }

        //get closest upcoming appointment
        $upcoming = $this->appointmentModel->getMostRecent($patientId, $currDate, $currTime);

        if ($upcoming) {
            $upcoming->time = Generate::changeTimeFormat($upcoming->time, Generate::TIME_FORMAT_12);
            $data['upcoming'] = $upcoming;
        }
        else{
            $data['upcoming'] = false;
        }

        $this->view('pages/patient/index', $data);
    }

    public function error()
    {
        $this->view('404');
    }
}