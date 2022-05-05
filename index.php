<?php session_start();

if (isset($_SESSION['username'])){
   header("Location: php/tableaudebord/principale.php");
}
 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>NanoCom</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script type="text/javascript" src="Js/nanodoc.js"></script>
    <script type="text/javascript" src="Js/jquery-3.6.0.js"></script>
    
</head>

<!-- Barre de navigation -->
     <header>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Accueil</a>
  <a href="#cont">Contact</a>
  <a href="php/inscription/inscription.php">Premiere Connexion?</a>
  <a href="#"></a>
</div>

<span style="font-size:30px;cursor:pointer;color:white;padding: 5px" onclick="openNav()">&#9776; Menu</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

</header>
     


     
     
 <!-- bloc principale -->
<body>
<h2 style="color:white;"> Les identifiants de demo sont : Demo et mot de passe : Demo , pour un compte Admin : Admin et Admin. </h2>
    <div class="bloc">
        
    
 <div class="page">
 	<div class="con">
 		<!-- Connexion -->
 		<form action="php/script/connexion.php" method="post" id="form2">
 			<h1 style="color: white;text-align: center;">NanoDoc'</h1>
               <div class="user">
                    
                    <label for="username"><i style="color: white;" class="fa fa-user icon"></i>  Nom D'utilisateur</label>
                    <input type="text" name="username" size="30" placeholder="Nom d'utilisateur" required="required" >
               </div>
               <div class="pswd">
                   
                    <label for="upassword"><i style="color: white;" class="fa fa-key icon"></i>  Mot de passe</label>
                    <input type="password" name="password" id="upassword"size="30"      placeholder="Mot de passe" required="required" />
               </div><div class="check">
                 <input type="checkbox" id="show-password">
                    <label for="show-password">Afficher Mot de passe</label>
               </div>
               <div class="wrap">
               <button class="button" type="submit" form="form2" value="Connexion">Connexion</button>
               <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
               </div>

                
               
               
               

 	    </form>
                
 	    <!-- Page principale -->
 	</div>
 	
 </div>

 <div class="slid">
     
 


 <button class="accordion">NanoCom, Nos services : </button>
 <div class="panel" id="info+">
  <img class="imageinfo" src="image/fibre.jpg">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


 </div>
 <button class="accordion">Contact </button>
 <div class="panel1" class="cont">

    <img  class="imageinfo1" src="image/logo_nanocom.jpeg">
    <div class="contact1">

      <p>Plus d'information sur Nanocom : <a href="https://www.societe.com/societe/nanocom-828955054.html" target="_BLANK">ICI</a></p>


    </div>
    
    



 </div>
 </div>


 
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</div>

</body>

<!-- Contact -->

<footer>
     

     

</footer>
<script>
  feather.replace();
</script>
</html>




               