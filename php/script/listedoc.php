<?php include 'bdd.php'; 

$username=$_SESSION['username'];
$path = "../../uploads/$username";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
            	if(isset($username))
            	{

            		
            		//var_dump($employe);
            		$rep = '../../uploads/'.$username.'/'; //Adresse du dossier
                  echo '<ul  >';
                  //echo '<b style="font-size:20px;">'.$username.'</b>';
                  if($dossier = opendir($rep))
                  	{
                  		while(false !== ($fichier = readdir($dossier)))
                  			{
                  				if($fichier != '.' && $fichier != '..' )
                  					{

                  						echo '<li  class="lidoc"><a  class="listedoc" href="' . $rep . '/' . $fichier . '" target="_blank">' . $fichier . '</a></li> ';

										 

                  					}
                  			}
                  			echo '</ul><br />';
                           closedir($dossier);
                        }	
                        else
                           echo 'Une erreur est survenue';	
                     }	
					 

					 
 

?>