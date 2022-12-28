<?php
use utils\Response;
use utils\Generate;
use helpers\Session;
use utils\Request;
/* intermediate controller only to handle ajax requests */
class Ajax extends BaseController
{

    private $appointmentModel;
    private $patientModel;
    private $adminModel;

    public function __construct()
    {
        $this->appointmentModel = $this->model('AppointmentModel');
        $this->patientModel = $this->model('PatientModel');
        $this->adminModel = $this->model('AdminModel');
    }

    public function getAllUpcomingAppoint(){
        $currDate = Generate::currentDate();
        $currTime = Generate::currentTime();
        //get currently logged in patients id
        $patientId = $this->patientModel->getPatientId(Session::get('user_id'));
        // get all upcoming appointments
        $upcomingAppointments = $this->appointmentModel->getAllUpcoming($patientId, $currDate, $currTime);
        foreach ($upcomingAppointments as $appointment){
            $appointment->time = Generate::changeTimeFormat($appointment->time,Generate::TIME_FORMAT_12);
        }
        $res = new Response($upcomingAppointments);
        Request::setHeader(Request::HEADER_CONTENT_TYPE, Request::CONTENT_TYPE_JSON);
        echo $res->toJson();
    }

    public function getAllUsers(){

        $patients = $this->adminModel->getAllPatients();
        $staffMembers = $this->adminModel->getAllStaff();
        $pharmacists = $this->adminModel->getAllPharmacists();

        $allUsers = [
            'patients' => $patients,
            'staffMembers' => $staffMembers,
            'pharmacists' => $pharmacists
        ];
        $res = new Response($allUsers);
        Request::setHeader(Request::HEADER_CONTENT_TYPE, Request::CONTENT_TYPE_JSON);
        echo $res->toJson();
    }

    public function getActiveUsers(){
        $activePatients = $this->adminModel->getActivePatients();
        $activeStaffMembers = $this->adminModel->getActiveStaff();
        $activePharmacists = $this->adminModel->getActivePharmacists();

        $activeUsers = [
            'patients' => $activePatients,
            'staffMembers' => $activeStaffMembers,
            'pharmacists' => $activePharmacists
        ];

        $res = new Response($activeUsers);
        Request::setHeader(Request::HEADER_CONTENT_TYPE, Request::CONTENT_TYPE_JSON);
        echo $res->toJson();
    }
}