<?php
     /* Database connection */
     class Database{
          private $host = DB_HOST;
          private $user = DB_USER;
          private $password = DB_PASSWORD;
          private $dbname = DB_NAME;

          private $dbh;
          private $error;

          public function __construct()
          {
               $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

               try {
                    $this->dbh = new PDO($dsn,$this->user, $this->password);
               } 
               catch (PDOException $e) {
                    $this->error = $e->getMessage();
                    echo $this->error;
               }
          }
     }