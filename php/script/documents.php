 <meta http-equiv="refresh" content="0; URL=../tableaudebord/documents.php"> 


<?php 
include 'bdd.php';



$username=$_SESSION['username'];
$patho='../../uploads/'.$username.'' ;
                  $path = $patho;
                   var_dump($path);



                      if (!file_exists($path)) {
                         mkdir($path, 0777, true);
                            }




if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0)
{
 //if ($_FILES['file-upload-field']['size'] <= 1000000)
        //{
           
           
        	   $fileInfo = pathinfo($_FILES['upload']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['docx', 'xlsx', 'pptx', 'pdf','png','jpeg','jpg'];
            if (in_array($extension, $allowedExtensions))
                {
                     move_uploaded_file($_FILES['upload']['tmp_name'], '../../uploads/'.$username.'/' . basename($_FILES['upload']['name']) );
                     

                     
                	  echo "L'envoi a bien été effectué !";

                
                }
 
        
        //       }
}







/*
$message=$_POST['message'];
var_dump($message);


$requete="INSERT INTO message(Contenu,IDuser) VALUES ('$message','$username') ";
var_dump($requete);
$exec_requete=mysqli_query($db,$requete);
var_dump($exec_requete);
*/









