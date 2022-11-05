<?php

function input($input){
     if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
          return trim(strip_tags($_POST[$input]));
     }
     else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get"){
          return trim(strip_tags($_GET[$input]));
     }
}