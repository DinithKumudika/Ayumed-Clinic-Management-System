<?php
     require_once '../app/init.php';

     /* composer autoload */
     require_once __DIR__ .'/../vendor/autoload.php';

     /* load PHP dotenv library */
     $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
     $dotenv->load();

     /* initialize app class */
     $app = new App();