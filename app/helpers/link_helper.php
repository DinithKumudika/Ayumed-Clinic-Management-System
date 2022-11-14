<?php

function loadCSS($fileName){
     echo '<link rel="stylesheet" href="'. URL_ROOT .'"/css/"'.$fileName.'".css">';
}

function loadJS($fileName){
     echo '<script src="'.URL_ROOT.'"/js/"'.$fileName.'".js"></script>';
}


