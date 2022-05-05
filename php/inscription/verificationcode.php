<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/code.css">
    <script type="text/javascript" src="../../Js/nanodoc.js"></script>
    <title>Document</title>
</head>
<body>




<div class="container">
  
  <h2>Verification du code employé<small>Entrez le code reçu</small></h2>
  
  <form class="verifcode" action="" method="POST" id="form3">
    
    <div class="group">      
    <input class="nb" type="text" name="code" pattern='[0-9]+'  maxlength="6" minlength="6"/>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Code de verification:</label>
    </div>
    <div class="wrap">
  <button class="button" type="submit" form="form3" value="Confirmer">Confirmer</button>
  </div>
      
    
    
  </form>
      
 
  
</div>
</body>
</html>

<?php include '../script/bdd.php';
//$username=$_POST['username'];

if(isset($_SESSION['nom'])&& isset($_SESSION['prenom'])){
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];


$confimerrq="SELECT CODE FROM employe WHERE Nom='$nom' AND Prenom='$prenom' ";
$exconfirmer=mysqli_query($db,$confimerrq);
//var_dump($confimerrq);
$resultat=mysqli_fetch_array($exconfirmer);
//var_dump($resultat);

if(isset($_POST['code'])){
    //echo 'ok';
    $code=$_POST['code'];
    if ($resultat[0]===$code){
        //echo "ddddddddddddddddddddddddddd";
        header('location: inscriptionform.php');
        $_SESSION['inscription']=$nom;

    }
}
}


