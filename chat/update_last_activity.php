<?php

//update_last_activity.php

include('database_connection.php');

session_start();

$query = "
UPDATE compte
SET last_activity = now() 
WHERE user_id = '".$_SESSION["user_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();
var_dump($statement);

?>

