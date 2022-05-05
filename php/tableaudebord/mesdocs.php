<?php include '../script/bdd.php';$username=$_SESSION['username'];?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../css/doc.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="../../Js/nanodoc.js"></script>
  <title>Document</title>
</head>
<body>
  <div class="partie-gauche">
		<h1>Nanodoc'</h1>
		<div class="bouton-accueil"> 
			<button onclick="location.href='../../index.php'"><i class="fa fa-home"></i>Accueil</button>
		</div>
		
		<div class="bouton-messagerie">
		<button onclick="location.href='../../chat/index.php'"><i class="fa fa-regular fa-envelope"></i>Messagerie</button>

		</div>
		<div class="Mes-documents">
		<button onclick="location.href='mesdocs.php'"><i class="fa fa-regular fa-folder"></i>Documents</button>

		</div>
		<div class="parametre">
		<button onclick="location.href='settings.php'"><i class=" fa fa-solid fa-gear"></i></i>Paramètre</button>

		</div>

		<!-- <div class="infouser"> -->
			<!-- <p class="log">Bonjour, <?php echo $username; ?></p>  -->
			<!-- <p>Version Alpha de NANODOC !</p> -->
		<!-- </div> -->
		<div class="bouton-deconnexion">
			<button onclick="location.href='principale.php?deconnexion=true'"><i class="fa fa-close"></i>Déconnexion</button>
			<?php if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {
                      session_unset();
                      header("location:../../index.php");
                       $_SESSION['username']=null;
					   setcookie('userck',time()- 3600);
					}
				}?>
        
		</div>
	</div>
  <div class="dossier">

  
<h1 class="choisir">Choisir le fichier a supprimer :</h1>
<?php




$path = "../../uploads/$username";
echo '<table>';
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
            	if(isset($username))
            	{
                

            		
            		//var_dump($employe);
            		$rep = '../../uploads/'.$username.''; //Adresse du dossier
                  //echo '<ul >';
                  //echo '<b style="font-size:20px;">'.$username.'</b>';
                  if($dossier = opendir($rep))
                  	{

                      echo '<tr><th> Nom </th> <th> Taille </th> <th> Extension </th> <th> Date </th> ';
                      ?> <form style="display: flex;"  action="" method="POST" class="delete"> <div class="dl"> <?php
                  		while(false !== ($fichier = readdir($dossier)))
                  			{


                  				if($fichier != '.' && $fichier != '..' )
                  					{
                              
                          

                          
                              $extension = pathinfo($fichier, PATHINFO_EXTENSION);
                              echo '<tr>';

                              

                  						echo '<td  class="lidoc"><a  class="listedoc" href="' . $rep . '/' . $fichier . '" target="_blank">' . $fichier . '</a></td> ';

                              $taille=filesize($rep.'/'.$fichier);
                              //var_dump($taille);
                              $taille1=round($taille / 1024 , 1);
                              //var_dump($taille1);
                              $date=filemtime($rep.'/'.$fichier);
                             

                              echo '<td> '.$taille1.' <small>Ko</small></td>';
                             

                              

                              echo '<td> '.$extension.' </td>';

                              echo '<td>' .date('d /m /Y ',$date).    '</td>';
                              
                              echo '</tr>';
                              ?><label class='fichier1' for="fichier"><?php echo $fichier;?></label><input type="checkbox" name="fichier" id="fichier" value="<?php echo $fichier;?>"> <br>
                          <?php
                              

                              
                            }
                  					}
                  			}
                  			//echo '</ul>'
                        echo '<br />';
                           closedir($dossier);
                        }	
                        else
                           echo 'Une erreur est survenue';	
                     	
                      

                     
                      //$extension = pathinfo($fichier, PATHINFO_EXTENSION);
                        //    echo $extension;
 

?>




<input class="fichier2" type="submit" value="Supprimer le fichier selectionné"></form>

</div>
<?php 
$dir='../../uploads/'.$username.'';
if (isset($_POST['fichier'])){
  $delete=$_POST['fichier'];
}

//var_dump($delete);
if (isset($delete) && file_exists($dir.'/'.$delete)){
  
  unlink($dir.'/'.$delete);
  header("Location: mesdocs.php");

}
echo "</table>";
?>
</div>
</body>
<footer>
  <h1 style="color: white;">BETA Suppression Fichier</h1>
</footer>
</html>






                         




