<?php

use helpers\Session;
use helpers\File;
use utils\Flash;
use utils\Url;
use utils\Generate;
use utils\Request;
use utils\Alert;

class Profile extends BaseController
{
    private $userModel;
    private $profileModel;
    private $patientModel;

    public function __construct (){

        if(!Session::isLoggedIn()){
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login_patient');
        }
        else{
            $this->userModel = $this->model("UserModel");
            $this->patientModel = $this->model("PatientModel");
            $this->profileModel = $this->model("ProfileModel");
        }
    }

    public function index($userId){
        $roleId = Session::get('role_id');
        $user = $this->userModel->getUser(Session::get('username'));
        $profileImage = $this->profileModel->getAvatar($userId);
        $data['user'] = $user;
        $data['profile_img'] = $profileImage;

        if($roleId == 1){
            $notifyMethods = $this->profileModel->getNotificationMethods($userId);
            $patient = $this->patientModel->getPatient($userId);
            $patient->DOB = Generate::changeDOBFormat($patient->DOB);
            $data['notification_methods'] = $notifyMethods;
            $data['patient'] = $patient;
            $this->view('pages/patient/profile',$data);
        }
    }

    public function edit($userId){
        $roleId = Session::get('role_id');

        $user = $this->userModel->getUser(Session::get('username'));
        $notifyMethods = $this->profileModel->getNotificationMethods($userId);
        $profileImage = $this->profileModel->getAvatar($userId);

        if($roleId == 1){

            $patient = $this->patientModel->getPatient($userId);

            if(Request::isPost()){

                $data = [
                    'notify_opt' => $_POST['notify_opt'],
                    'first_name' => strip_tags(trim($_POST['first-name'])),
                    'last_name' => strip_tags(trim($_POST['last-name'])),
                    'dob' => strip_tags(trim($_POST['dob'])),
                    'address' => strip_tags(trim($_POST['address'])),
                    'email' => strip_tags(trim($_POST['email'])),
                    'phone_no' => strip_tags(trim($_POST['phone-no'])),
                    'username' => strip_tags(trim($_POST['username'])),
                    'avatar' => $_FILES['avatar-upload'],
                    'error' => ''
                ];

                foreach ($data['notify_opt'] as $option){
                    if($option == "opt_whatsapp"){
                        $data['whatsapp_notification'] = true;
                    }
                    else{
                        $data['whatsapp_notification'] = false;
                    }

                    if($option == "opt_sms"){
                         $data['sms_notification'] =  true;
                    }
                    else{
                        $data['sms_notification'] = false;
                    }

                    if($option == "opt_email"){
                        $data['email_notification'] = true;
                    }
                    else{
                        $data['email_notification'] = false;
                    }
                }

                $data['age'] = Generate::age($data['dob']);
                $this->profileModel->updateUserDetails($data, $userId);
                $this->profileModel->updatePatientDetails($data, $userId);

                if(!empty($data['avatar'])){
                    $avatarImage = new File($data['avatar']);
                    $avatarImage->setExtension();
                    $avatarImage->setFileName($userId);
                    $avatarImage->setFilePath($avatarImage::TYPE_PROFILE_IMAGE);

                    if($avatarImage->upload()){
                        $this->profileModel->updateAvatar($avatarImage->getFilePath(), $userId);
                    }
                }
                echo Alert::Notification('Success', "Profile Updated", Alert::MESSAGE_SUCCESS);
                Url::redirect('profile/index/'.$userId);
            }
            else{
                $data = [
                    'notify_opt' => '',
                    'first_name' => '',
                    'last_name' => '',
                    'dob' => '',
                    'address' => '',
                    'email' => '',
                    'phone_no' => '',
                    'username' => '',
                    'avatar' => '',
                    'error' => ''
                ];
            }

            $data['user'] = $user;
            $data['notification_methods'] = $notifyMethods;
            $data['patient'] = $patient;
            $data['profile_img'] = $profileImage;

            $this->view('pages/patient/editProfile',$data);
        }
    }

    public function error()
    {
        $this->view('404');
    }
}