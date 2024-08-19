<?php

spl_autoload_register(function ($classname){
    
    $lower = strtolower($classname);
    

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false){
        $path = 'classes/'.$lower.'.class.php';
    }
    else{
        $path = '../includes/classes/'.$lower.'.class.php';
    }

    $ext = '.class.php';

    require_once $path;

});






