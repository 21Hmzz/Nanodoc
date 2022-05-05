<?php

include '../script/bdd.php';

if(isset($_SESSION['inscription']) or  isset($_SESSION['username'])){
    //$_SESSION['inscription']=null;

}else{
    header('location: verificationcode.php');
    //echo " Code de verification Incorrect";
}
if(isset($_SESSION['nom'])&& isset($_SESSION['prenom'])){
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];

$inforequete="SELECT * FROM employe WHERE Nom='$nom' AND Prenom='$prenom'";
//var_dump($inforequete);
$executerrequete=mysqli_query($db,$inforequete);
//var_dump($executerrequete);
$resulatinfo=mysqli_fetch_array($executerrequete);
//var_dump($resulatinfo);
$nom1=$resulatinfo['Nom'];
$prenom1=$resulatinfo['Prenom'];
$matricule=$resulatinfo['MATRICULE'];
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/signup.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
  
  <h2>Validation du compte NanoDoc'<small>Completez vos informations</small></h2>
  
  <form  autocomplete="off" action="inscriptionform1.php" method="POST" id="form4" >
 
    
    <div class="group">      
	<input name="nom" id="nom" type="text" class="input" readonly value="<?php echo $nom1;?>">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label></label>
    </div>
      
    <div class="group">      
	<input name="prenom" id="prenom" type="text" class="input"  readonly  value="<?php echo $prenom1;?>">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label></label>
    </div>
	<div class="group">      
	<input name="matricule"  id="matricule" type="text" class="input"  readonly value="<?php echo $matricule;?>">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label></label>
    </div>
	<div class="group">      
	<input  name="tel" id="tel" type="text" class="input" required="required" maxlength="10" pattern="[0-9]+">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Téléphone</label>
    </div>
	<div class="group">      
	<input name="mail" id="mail" type="email" class="input" required="required" >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>
	<div class="group">      
	<input name="user" id="user" type="text" class="input" required="required" >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Nom D'utilisateur</label>
    </div>
	<div class="group">      
	<input name="mdp" id="mdp" type="password" class="input" data-type="password" required="required" autocomplete="new-password" >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mot de passe</label>
    </div>
	<div class="wrap">
  <button class="button" type="submit" form="form4" value="Inscription">Inscription</button>
  </div>
    
  </form>
      
 
  
</div>
</body>
</html>