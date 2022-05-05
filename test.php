<?php

if(!isset($_SESSION)){
      session_start();
  }
               
                //var_dump($_SESSION['username']);

     $db_username='hamzadwhamza';
     $db_password='hamza2107Hb';
     $db_name='hamzadwhamza';
     $db_host='hamzadwhamza.mysql.db';
     $db = mysqli_connect($db_host, $db_username, $db_password,$db_name);
 
      //var_dump($reponse);
if (!$db){
echo "ko";
};
$req="select * from employe";
$ex=mysqli_query($db,$req);
var_dump($req);
var_dump($ex);
$result=mysqli_fetch_array($ex);
var_dump($result);
            ?>