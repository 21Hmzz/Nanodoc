<?php include '../script/bdd.php';

if(isset($_POST['prenom'])&&isset($_POST['nom'])&&isset($_POST['matricule'])&&isset($_POST['tel'])&&isset($_POST['mail'])&&isset($_POST['mdp'])&&isset($_POST['user'])){
    echo "ok";
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $matricule=$_POST['matricule'];
    $tel=$_POST['tel'];
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];
    $user=$_POST['user'];
    $mdphacher=password_hash($mdp,PASSWORD_DEFAULT);
    //$test=password_verify($mdp,$mdphacher);
    //var_dump($test);
    if (password_verify($mdp,$mdphacher)){
        $creationuser=mysqli_query($db,"INSERT INTO login (username, password, nom, prenom, Matricule, Numero, mail) VALUES ('$user', '$mdphacher','$nom', '$prenom', '$matricule', '$tel', '$mail')");
        var_dump($creationuser);
        $_SESSION['username']=$user;
        header('location: ../tableaudebord/principale.php' );
    }
}

