<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NanoDoc'</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
   <script type="text/javascript" src="../../Js/nanodoc.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <meta http-equiv="refresh" content="3; URL=../tableaudebord/principale.php"> 
</head>

<body style="display: flex; justify-content:center;align-items:center;top: 50%;
   left: 50%; background-color:midnightblue;">
<button class="buttonload" style="
  background-color: blue;
  border: none; 
  color: white; 
  padding: 12px 16px; 
  font-size: 50px;
  margin-top:20%;

">
  <i class="fa fa-circle-o-notch fa-spin"></i>En cours de modification...
</button>
</body>

<?php 


include 'bdd.php';
include 'infoducompte.php';



if (isset($_POST['mail']) && isset($_POST['Numero']) )
{
$mail=$_POST['mail'];
$numero=$_POST['Numero'];
//var_dump($mail);
//var_dump($numero); 



$rqmodif="UPDATE `login` SET `mail` = '$mail', `Numero` = '$numero' WHERE `login`.`username` = '$username'";
//var_dump($rqmodif);
$exrq=mysqli_query($db,$rqmodif);
}
?>





