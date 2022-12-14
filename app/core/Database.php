<?php
     /* Database connection */
     abstract class Database{

          protected static $dbh = null;
          private $stmt;

          // connect to the database
          protected static function connect(){
               $host = $_ENV['DB_HOST'];
               $username = $_ENV['DB_USER'];
               $password = $_ENV['DB_PASSWORD'];
               $dbname = $_ENV['DB_NAME'];

               try {
                    // PDO instance
                    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
                    self::$dbh = new PDO($dsn, $username, $password);
                    // enable errors in the form of exceptions
                    self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    // set default fetch mode as object
                    self::$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    // disable emulation mode
                    self::$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                    return self::$dbh;
               } 
               catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
               }
          }

           public function query($sql){
               $this->stmt = self::$dbh->query($sql);
               return $this->stmt->fetch();
          }

          // prepare sql query
          public function prepare($sql){
               $this->stmt = self::$dbh->prepare($sql);
          }

          // execute the query
          public function execute($params){
               return $this->stmt->execute($params);
          }

          // get result set as an object
          public function resultSet($params){
               $this->execute($params);
               return $this->stmt->fetchAll();
          }

          //get a single result as an object
          public function result($params){
               $this->execute($params);
               return $this->stmt->fetch();
          }

          //get the result row count
          public function rowCount(){
               return $this->stmt->rowCount();
          }
     } 