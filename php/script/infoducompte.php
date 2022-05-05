<?php include 'bdd.php';




$username=$_SESSION['username'];
//var_dump($username);

$inforequete="SELECT * FROM login WHERE username='$username'";
//var_dump($inforequete);
$executerrequete=mysqli_query($db,$inforequete);
//var_dump($executerrequete);
$resulatinfo=mysqli_fetch_array($executerrequete);
//var_dump($resulatinfo);
?>
