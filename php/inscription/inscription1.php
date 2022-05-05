<?php include '../script/bdd.php';
mb_internal_encoding('UTF-8');

ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "noreply-nanodoc@nanocom.go.yj.fr";
    //$to = "test@hostinger.fr";
    $subject = "Votre code NanoDoc !";
    //$message = "PHP Mail fonctionne parfaitement";
    $headers = "De :" . $from;
    //mail($to,$subject,$message, $headers);
    echo "L'email a été envoyé.";

$nom=strtoupper($_POST['nom']);
$prenom=strtoupper($_POST['prenom']);
//var_dump($prenom);
//var_dump($nom);
$mail=$_POST['mail'];
$code= substr(number_format(time() * rand(),0,'',''),0,6);
$body='Votre code est :' . $code . '';
$subject='Votre code Nanodoc !';
$req="SELECT * FROM login WHERE nom='$nom' AND prenom='$prenom' ";
$req2="SELECT * FROM login";
$verifdispo=mysqli_query($db,$req);
$verifdispo2=mysqli_query($db,$req2);
var_dump($verifdispo2);
$result1=mysqli_fetch_array($verifdispo);
//var_dump($result1);
$count=count($result1);
//var_dump($count);
if ($count != 0){
	header('location: inscription.php?erreur=1');
}else{

if(isset($nom)&& isset($prenom)&& isset($mail)){
    $rqverif="SELECT count(*) FROM employe where Nom = '$nom' and Prenom = '$prenom' " ;
    
    $exec_requete = mysqli_query($db,$rqverif);
var_dump($exec_requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count1 = $reponse['count(*)'];
    var_dump($count1);
    if($count1!=0) // nom d'utilisateur et mot de passe correctes
        {
            //echo "ok";
			if (filter_var($mail,FILTER_VALIDATE_EMAIL)){
				$codeinsertrq="UPDATE employe set CODE='$code' WHERE Nom='$nom' AND Prenom='$prenom' ";
				$insertcode=mysqli_query($db,$codeinsertrq);
				//var_dump($insertcode);
				$message='Votre code est :' . $code . '';
				$_SESSION['nom']=$nom;
				$_SESSION['prenom']=$prenom;
				mail($mail,$subject,$message, $headers);
            
				
			header('location: verificationcode.php');
	
			
            

			////if (true !== $result)
////{
	// erreur -- traiter l'erreur
	//echo $result;
//}
			} 
			else{
//header('location: inscription.php');
}
        }else{
            //echo "no";
			//header('Location: inscription.php?erreur=2'); // Employé non reconnu , contactez votre administrateur
        }
}}
