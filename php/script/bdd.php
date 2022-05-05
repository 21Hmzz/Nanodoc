<?php

if(!isset($_SESSION)){
      session_start();
  }
               
                //var_dump($_SESSION['username']);

     $db_username='hamzadwhamza';
     $db_password='bella7905Hb';
     $db_name='hamzadwhamza';
     $db_host='hamzadwhamza.mysql.db';
     $db = mysqli_connect($db_host, $db_username, $db_password,$db_name);
 
      //var_dump($reponse);

            ?>