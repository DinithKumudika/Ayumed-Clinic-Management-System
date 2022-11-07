<?php
     //composer autoload
     require_once '../vendor/autoload.php';
     
     // Load config
     require_once 'config/config.php';
     require_once 'config/dbCredentials.php';

     // Load helper functions
     require_once 'helpers/url_helper.php';
     require_once 'helpers/input_helper.php';
     require_once 'helpers/session_helper.php';

     // Load all the core files
     require_once 'core/App.php';
     require_once 'core/BaseController.php';
     require_once 'core/Database.php';
     require_once 'core/Session.php';