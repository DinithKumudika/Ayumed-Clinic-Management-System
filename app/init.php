<?php

// Load config
require_once 'conf/config.php';

// Load helper classes
require_once 'helpers/Session.php';
require_once 'helpers/Email.php';
require_once 'helpers/File.php';

// Load utility classes
require_once 'utils/Url.php';
require_once 'utils/Request.php';
require_once 'utils/Crypto.php';
require_once 'utils/Generate.php';
require_once 'utils/Flash.php';
require_once 'utils/Token.php';
require_once 'utils/Validate.php';
require_once 'utils/Alert.php';
require_once 'utils/Response.php';

// Load all the core files
require_once 'core/App.php';
require_once 'core/BaseController.php';
require_once 'core/Database.php';
