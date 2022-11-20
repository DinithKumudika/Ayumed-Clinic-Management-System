<?php

function redirect($location){
     header("Location: " .URL_ROOT. '/' . $location);
}

function redirectToHome($roleId){
     switch ($roleId) {
          case 1:
               redirect('patient/index');
               break;
          case 2:
               redirect('doctor/index');
               break;
          case 3:
               redirect('staffMem/index');
               break;
          case 4:
               redirect('pharmacist/index');
          case 5:
               redirect('admin/index');
          default:
               redirect('user/login');
               break;
     }
}