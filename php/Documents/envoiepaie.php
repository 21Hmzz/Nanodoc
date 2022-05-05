


<?php 
include '../script/bdd.php';



$employe=$_GET['emp'];
var_dump($employe);
$patho='../../uploads/'.$employe.'' ;
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
                     move_uploaded_file($_FILES['upload']['tmp_name'], '../../uploads/'.$employe.'/' . basename($_FILES['upload']['name']) );
                     

                     
                	  echo "L'envoi a bien été effectué !";

                
                }
 
        
        //       }
}
