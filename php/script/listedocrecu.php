<?php
 include 'bdd.php';

$path = "../../uploads/admin/$username";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}



                     
$rep = '../../uploads/admin/'.$username.'/'; //Adresse du dossier
echo '<ul class="uldoc">';
if(isset($username)){
   //opendir($rep);
   //var_dump(opendir($rep));
    if($dossier = opendir($rep)){
        while(false !== ($fichier = readdir($dossier)))
        {
            if($fichier != '.' && $fichier != '..' )
            {
                echo '<li  class="lidoc1"><a  class="listedoc1" href="' . $rep . '/' . $fichier . '" target="_blank">' . $fichier . '</a></li>';

            }

        }
        echo '</ul><br />';
        closedir($dossier);

    }
    else

    echo 'Une erreur est survenue';
 	

    

}












?>