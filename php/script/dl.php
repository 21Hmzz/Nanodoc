




<?php



session_start();

$username=$_SESSION['username'];


$rep = 'uploads/'.$username.' '; //Adresse du dossier
echo '<ul>';
if($dossier = opendir($rep))
{
while(false !== ($fichier = readdir($dossier)))
{
if($fichier != '.' && $fichier != '..' )
{
echo '<li><a href="' . $rep . '/' . $fichier . '">' . $fichier . '</a></li>';
}
}

echo '</ul><br />';
closedir($dossier);
}

else
echo 'Une erreur est survenue';
?>