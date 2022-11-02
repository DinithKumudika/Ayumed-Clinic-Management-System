<?php
     /* Database connection */
     abstract class Database{
          static $dbh = null;

          static function connect(){
               $host = DB_HOST;
               $username = DB_USER;
               $password = DB_PASSWORD;
               $dbname = DB_NAME;

               try {
                    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
                    return $dbh;
               } 
               catch (PDOException $e) {
                    $error = $e->getMessage();
                    echo $error;
               }
          }
     } 