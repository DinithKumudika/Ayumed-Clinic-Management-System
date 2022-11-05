<?php
session_start();

// Display flash messages using sessions
function flash_message($name='', $message = ''){
     if(!empty($name)){
          if(!empty($message) && empty($_SESSION[$name])){
               if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
               }
               $_SESSION[$name] = $message;
          }
          else if(empty($message) && !empty($_SESSION[$name])){
               echo '<div>'.$_SESSION[$name].'</div>';
               unset($_SESSION[$name]);
          }  
     }
}
