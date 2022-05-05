<?php include '../script/bdd.php';
 include '../script/infoducompte.php';
 
 if (isset($_SESSION['username'])){
   
 }else{
   header("Location: ../../index.php");
 } 
 ini_set('display_errors', 'On');
 chmod($_SERVER['DOCUMENT_ROOT'], 0777);
 
 //var_dump(chmod($_SERVER['DOCUMENT_ROOT'], 0777)); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/test1.css">
    <script type="text/javascript" src="../../Js/test.js"></script>
    <script type="text/javascript" src="Js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Documents | NanoDoc'</title>
</head>
<body>
    
<div class="wrapper">

  <nav>

    <header>
      <span></span>
      <?php echo $username; ?>
      <a onclick="location.href='Note.php?deconnexion=true'"></a>
    </header>

    <ul>
      <li><span>Menu</span></li>
      <li><a href="../tableaudebord/principale.php">Tableau de bord</a></li>
      <li><a  href="../../chat/principalechat.php">Messagerie</a></li>
      <li><a class="active">Documents</a></li>
      <li><a href="../tableaudebord/settings.php">Réglages</a></li>
      <li><a>*fonction en developpement*</a></li>
      <!-- <li><a>*fonction en developpement*</a></li> -->
      <!-- <li><a>*fonction en developpement*</a></li> -->
      <li><span>Autre</span></li>
      <!-- <li><a>*fonction en developpement*</a></li>
      <li><a>*fonction en developpement*</a></li> -->
      <li><a onclick="location.href='Note.php?deconnexion=true'">Déconnexion</a></li>
      <?php if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {
                      session_unset();
                      header("location:../../index.php");
                       $_SESSION['username']=null;
                        $_SESSION['gerant']=null;
					   setcookie('userck',time()- 3600);
					}
				}?>
    </ul>

  </nav>

  <main>

    <h1>NanoDoc'</h1>

    <div class="flex-grid">
      <div class="info">
        <h2>Note d'intervention</h2>
        <?php
       
        
        $path = "../../uploads/Nanocom/Note";
        echo '<table>';
        if (!file_exists($path)) {
          mkdir($path, 0777, true);
      }
      if(isset($username))
            	{
                $rep = "../../uploads/Nanocom/Note"; //Adresse du dossier
                if($dossier = opendir($rep)){
                  echo '<tr><th> Nom </th> <th> Taille </th> <th> Extension </th> <th> Date </th> ';
                  while(false !== ($fichier = readdir($dossier))){
                    if($fichier != '.' && $fichier != '..' ){
                      $extension = pathinfo($fichier, PATHINFO_EXTENSION);
                      echo '<tr>';
                      echo '<td  class="lidoc"><a  class="listedoc" href="'.$rep.'/'.$fichier.'" target="_blank">'.$fichier.'</a></td> ';
                      $taille=filesize($rep.'/'.$fichier);
                      $taille1=round($taille / 1024 , 1);
                      $date=filemtime($rep.'/'.$fichier);
                      echo '<td> '.$taille1.' <small>Ko</small></td>';
                      echo '<td> '.$extension.' </td>';
                      echo '<td>' .date('d /m /Y ',$date).    '</td>';
                      echo '</tr>';
                    }
                  }
                }
                echo '<br />';
                closedir($dossier);
              }else
              echo 'Une erreur est survenue';
              ?>   
      </div>
    </div>
    <div class="flex-grid">
    <div class="tes">
      <h2>Supprimer un fichier</h2>
      <form action="" method="POST">
        <select name="delete" id="delete">
          <?php $dir='/NanoDoc/uploads/Nanocom/Note';
           if($dossier = opendir($rep)){
            while(false !== ($fichier = readdir($dossier))){
              if($fichier != '.' && $fichier != '..' ){
              ?> <option value="<?php echo $fichier ?>"><?php echo  $fichier ?></option>
              <?php }}}
              ?>
        </select>
        <input type="submit">
      </form>
      <?php 
      
if (isset($_POST['delete'])){
  $delete=$_POST['delete'];
  
  $file=$_SERVER['DOCUMENT_ROOT'].'/NanoDoc/uploads/Nanocom/Note/';
  var_dump($file);
  //var_dump($dir);
  
}

//var_dump($delete);
if (isset($delete)&& file_exists($file.$delete)){
  
  unlink($file.$delete);
  header("Location: Note.php");

}
      ?>
      </div>
    </div>
    <div class="flex-grid">
      <div class="doc1">
        <h2>Envoi de documents</h2>
        <form action="" method="post" enctype="multipart/form-data">
    Selectionnez un fichier à envoyer:
    <input type="file" name="upload" id="upload">
    <input type="submit" value="Envoyer le fichier" name="submit">
</form>
<?php if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0)
{
 //if ($_FILES['file-upload-field']['size'] <= 1000000)
        //{
           
           
        	$fileInfo = pathinfo($_FILES['upload']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['docx', 'xlsx', 'pptx', 'pdf','png','jpeg','jpg'];
            if (in_array($extension, $allowedExtensions))
                {
                     move_uploaded_file($_FILES['upload']['tmp_name'], '../../uploads/Nanocom/Note/' . basename($_FILES['upload']['name']) );
                     

                     
                	  echo "L'envoi a bien été effectué !";
                      ?><meta http-equiv="refresh" content="2; URL=Note.php"> <?php

                
                }
 
        
        //       }
}?>
</div>
      </div>
      
    </div>
       

  

 
    


  </main>
</div>

<script>

</script>
  


</body>
</html>

