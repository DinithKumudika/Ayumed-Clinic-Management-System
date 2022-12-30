<?php
// namespace imports
use helpers\Session;
use helpers\Email;
use utils\Flash;
use utils\Url;
use utils\Request;
use utils\Validate;
use utils\Crypto;

class Admin extends BaseController
{
    private $rememberLoginModel;
    private $adminModel;
    private $userModel;

    public function __construct()
    {
        $this->rememberLoginModel = $this->model('RememberLoginModel');

        if (!Session::isLoggedIn()) {
            Url::rememberRequestedPage();
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login/admin');
        }
        else{
            $this->adminModel = $this->model('AdminModel');
            $this->userModel = $this->model('UserModel');
        }
    }

    public function index()
    {
        $noOfAppointments = $this->adminModel->getTotalAppointments();
        $data = [
            'total_appointments' => $noOfAppointments,
            'total_prescriptions' => 0,
            'total_orders' => 0
        ];

        $this->view('pages/admin/index', $data);
    }

    public function manage_staff($param=null){
        if(Request::isPost()){
            Request::removeTags();

            $data = [
                'first_name' => trim($_POST['fist_name']),
                'last_name' => trim($_POST['last-name']),
                'reg_no' => trim($_POST['reg-no']),
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'error_uname' => '',
                'error_email' => ''
            ];

            $userExists = $this->userModel->isUserExists($data['username']);
            $emailExists = Validate::validateEmail($data['email']);

            if($userExists || !$emailExists){
                if ($userExists) {
                    $data['error_uname'] = 'username is already taken';
                }

                if(!$emailExists){
                    $data['error_email'] = "email doesn't exist";
                }
            }
            else{
                $data['password'] = Crypto::createHash($data['password']);

                if($this->userModel->register($data, 3)){
                    $userId = $this->userModel->getUserId($data['username']);

                    if($this->userModel->registerStaff($data['reg_no'],$userId)){
                        $email = new Email($data['email']);
                        $email->registrationNotification();
                    }
                }
            }
        }
        else{
            $data = [
                'first_name' => '',
                'last_name' => '',
                'reg_no' => '',
                'email' => '',
                'username' =>' ',
                'password' => '',
                'error_uname' => '',
                'error_email' => ''
            ];
        }
        $this->view('pages/admin/clinicStaff', $data);
    }
}