<?php include '../script/bdd.php';
 include '../script/infoducompte.php';
 
 if (isset($_SESSION['username'])){
   
 }else{
   //header("Location: ../../index.php");
 } 
 ini_set('display_errors', 'On'); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/test1.css">
    <script type="text/javascript" src="../../Js/test.js"></script>
    <script type="text/javascript" src="../../Js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Accueil | NanoDoc'</title>
</head>
<body>
    
<div class="wrapper">

  <nav>

    <header>
      <span></span>
      <?php echo $username; ?>
      <a onclick="location.href='settings.php?deconnexion=true'"></a>
    </header>

    <ul>
      <li><span>Menu</span></li>
      <li><a href="principale.php" >Tableau de bord</a></li>
      <li><a   href="../../chat/principalechat.php">Messagerie</a></li>
      <li><a href="documents.php">Documents</a></li>
      <li><a  class="active" href="settings.php">Réglages</a></li>
      <li><a>*fonction en developpement*</a></li>
      <!-- <li><a>*fonction en developpement*</a></li> -->
      <!-- <li><a>*fonction en developpement*</a></li> -->
      <li><span>Autre</span></li>
      <!-- <li><a>*fonction en developpement*</a></li>
      <li><a>*fonction en developpement*</a></li> -->
      <li><a onclick="location.href='settings.php?deconnexion=true'">Déconnexion</a></li>
      <?php if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {
                      session_unset();
                      header("location:../../index.php");
                       $_SESSION['username']=null;
                        $_SESSION['gerant']=null;
					   setcookie('userck',time()- 3600);
					}
				}?>
    </ul>

  </nav>

  <main>

    <h1>NanoDoc'</h1>

    <div class="flex-grid-2">
      <div class="mdp">
              <h2>Modifier mon mot de passe</h2>
              <form action="" method="POST">
                <label for="mdp">Entrez le mot de passe actuelle </label><input type="password" name="mdp" autocomplete="off">
                <label for="newmdp">Entrez votre nouveau mot de passe </label><input type="password" name="newmdp" autocomplete="new-password">
                <input type="submit" value="valider">
              </form>

              <?php if(isset($_POST['mdp'])&&isset($_POST['newmdp'])){
                $mdp=$_POST['mdp'];
                $newmdp=$_POST['newmdp'];
                $verif="SELECT * from login where username='$username'";
                //var_dump($verif);
                $execverif=mysqli_query($db,$verif);
                //var_dump($execverif);
                $resultat=mysqli_fetch_array($execverif);
                //var_dump($resultat);
                $oldmdp=$resultat['password'];
                if(password_verify($mdp,$oldmdp)){
                  $newmdp1=password_hash($newmdp,PASSWORD_DEFAULT);
                  //var_dump($oldmdp);
                  //var_dump($newmdp1);
                  $updatemdp="UPDATE login SET password='$newmdp1' where username='$username'";
                  $excupate=mysqli_query($db,$updatemdp);
                  mysqli_query($db,$updatemdp);
                  var_dump($updatemdp);

                }

              }?>

      </div>
      </div>
     

       <div class="flex-grid-2">
      <div class="mail">
      <h2>Modifier mon adresse email</h2>
              <form action="" method="POST">
                <label for="mail">Entrez la nouvelle adresse email</label><input type="email" name="mail" >
                
                <input type="submit" value="valider">
              </form>
               <?php if(isset($_POST['mail'])){
                $mail=$_POST['mail'];
                $update="UPDATE login SET mail='$mail' where username='$username'";
                $execverif=mysqli_query($db,$update);
                
               }?>

      </div>
    </div>
    <div class="flex-grid-2">
      <div class="tel">
      <h2>Modifier mon numéro de téléphone</h2>
              <form action="" method="POST">
                <label for="tel">Entrez le nouveau numéro de téléphone</label><input type="tel" name="tel" maxlength="10" pattern="[0-9]+" >
                
                <input type="submit" value="valider">
                 <?php if(isset($_POST['tel'])){
                $tel=$_POST['tel'];
                $update="UPDATE login SET Numero='$tel' where username='$username'";
                $execverif=mysqli_query($db,$update);
                
               }?>

              </form>

      </div>
    </div>
  

    

  </main>
</div>

<script>

</script>
  


</body>
</html>