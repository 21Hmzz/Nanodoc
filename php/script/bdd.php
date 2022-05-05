<?php

if(!isset($_SESSION)){
      session_start();
  }
               
                //var_dump($_SESSION['username']);

     $db_username='';
     $db_password='';
     $db_name='';
     $db_host='';
     $db = mysqli_connect($db_host, $db_username, $db_password,$db_name);
 
      //var_dump($reponse);

            ?>
