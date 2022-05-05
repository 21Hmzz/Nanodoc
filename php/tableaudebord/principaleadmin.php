<?php include '../script/bdd.php'; include '../script/infoducompte.php';
// include 'modification.php' 
//if (isset($_SESSION['username'])){
	
//}else{
	//header("Location: ../../index.php");
//}

//echo $_COOKIE['userck'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <script type="text/javascript" src="test.js"></script>
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
      <a></a>
    </header>

    <ul>
      <li><span>Menu</span></li>
      <li><a class="active">Tableau de bord</a></li>
      <li><a  href="../../chat/principalechat.php">Messagerie</a></li>
      <li><a href="documents.php">Documents</a></li>
      <li><a href="settings.php">Réglages</a></li>
      <li><a>*fonction en developpement*</a></li>
      <!-- <li><a>*fonction en developpement*</a></li> -->
      <!-- <li><a>*fonction en developpement*</a></li> -->
      <li><span>Autre</span></li>
      <!-- <li><a>*fonction en developpement*</a></li>
      <li><a>*fonction en developpement*</a></li> -->
      <li><a onclick="location.href='principaleadmin.php?deconnexion=true'">Déconnexion</a></li>
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

    <div class="flex-grid">
      <div class="employe">
        <h2>Employé</h2>
		<ul style="overflow:hidden; ">
			<?php
			$select="SELECT * from employe ";
			$excuterselect=mysqli_query($db,$select);
			//$resultatselect=mysqli_fetch_array($resultatselect);
			while ($employe=mysqli_fetch_array($excuterselect)){

			 ?>
			<li style="list-style: circle; margin-left: 10px; "><a href=""><?php echo $employe['Nom'] ; ?> <?php echo $employe['Prenom'] ; ?></a> </li>
			<?php }?>
		</ul>
		
       
     
      </div>
	  <div class="flex-grid-1">
			<div class="documentglobal">
				<h2>Document de l'entreprise</h2>
				<ul>
					<li><a href="../Documents/Paie.php">Fiche de paie</a> </li>
					<li><a href="../Documents/Contrat.php"">Contrat</a></li>
					<li><a href="../Documents/Note.php"">Note d'intervention</a></li>
					<li><a href="../Documents/Autres.php"">Autres</a></li>
				</ul>
			</div>
			
      <div class="doc">
        <h2>Documents Reçus</h2>
        <?php include '../script/listedocrecu.php'; ?>
      </div>
    
	
      <div class="doc">
        <h2>Documents</h2>
        <?php include '../script/listedoc.php'; ?>
      </div>
     
    
		</div>
	</div>
		
		<div class="flex-grid-2">
		 <div class="planning">
			 <h2>Planning</h2>
			 <div class="fancy-spinner">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="dot"></div>
		</div>
	
  

  </main>
  

</div>
</body>

</html>
