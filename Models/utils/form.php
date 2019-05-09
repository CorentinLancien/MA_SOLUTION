<?php

function post($name){
    return htmlentities(filter_input(INPUT_POST, $name));
}

function restoreText($name){
    if(!empty(post('Send'))){
        if((post($name))){
            echo post($name);
        }
    }
}

function NewDB(){
      try
      {
	       $bdd = new PDO('mysql:host=localhost;dbname=masolutiondb;charset=utf8', 'root', '');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }
      return $bdd;
}

function getIp(){
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip=$_SERVER['REMOTE_ADDR'];
    return $ip;
}