<?php 

session_start();
//include 'settings.php';

// connexion bdd
  include 'bdd.php';


// recup des entrées

   $username = $_POST['username']; 
    $password = $_POST['password'];
//var_dump($password);
    $rqverify="SELECT password FROM login WHERE username='$username'";
    $exverify=mysqli_query($db,$rqverify);
    //var_dump($exverify);
    $hach=mysqli_fetch_row($exverify);
    //var_dump($hach);
    //echo $hach[0];
    //var_dump($password);
    $mdphacher=$hach[0];
    //var_dump($mdphacher);
    //$testhach=password_hash($password,PASSWORD_DEFAULT);
    //var_dump($testhach);
    $test=password_verify($password, $mdphacher);
    //var_dump($test);

    
    
    

// verification log 
if(isset($_POST['username']) && isset($_POST['password']))
{
   if (password_verify(''.$password.'', $mdphacher)){
        $requete = "SELECT count(*) FROM login where username = '$username' and password = '$mdphacher' ";
        //var_dump($requete);
        //var_dump($requete);
        //echo "ok";

        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
       
        $count = $reponse['count(*)'];
        var_dump($exec_requete);

        $requete1="SELECT gerant FROM login where username = '$username' ";
        $exec_requete1 = mysqli_query($db,$requete1);
        
        $reponse1 = mysqli_fetch_array($exec_requete1);
        var_dump($reponse1);
        $compte=$reponse1;
   
       

       
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            
            if ($reponse1['gerant'] == '1') {

            
               $_SESSION['gerant']=$username;
               $_SESSION['username'] = $username;

               header('Location:../tableaudebord/principaleadmin.php');
           }else{


           
            $_SESSION['username'] = $username;
            header('Location:../tableaudebord/principale.php');
           




           }
         }
           



// retenir l'email de la personne connectée pendant 1 an
      /*setcookie(
       'LOGGED_USER',
       $username,
        [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
        ]
        );*/

      //var_dump($_COOKIE['LOGGED_USER']);
        



    

        else
        {
           
        }
    
    
}
else
{
   header('Location: ../../index.php?erreur=1');
}
mysqli_close($db); // fermer la connexion

        
}

?>



