<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script type="text/javascript" src="../../Js/nanodoc.js"></script>
    <script type="text/javascript" src="../../Js/jquery-3.6.0.js"></script>
    <title>Inscription | Nanodoc</title>
</head>
<body>
    
  <div class="container">
  <h2>Inscription à Nanodoc<small>Veuillez entrez vos informations</small></h2>
  
  <form action="inscription1.php" method="POST" id="form1"> 
    
    <div class="group">      
      <input type="text" name="nom"  required="required" >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Nom</label>
    </div>
      
    <div class="group">      
      <input type="text" name="prenom" required="required">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Prenom</label>
    </div>
    <div class="group">      
      <input type="mail" name="mail"  required="required">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>E-mail</label>
    </div>
    <div class="wrap">
  <button class="button" type="submit" form="form1" value="Confirmer">Confirmer</button>
  </div>
  <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<h3 style='color:red'>Un compte existe déja pour cet employé</h3>";
                }
                ?>
    
  </form>
      
  <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==2)
                        echo "<p style='color:red'>Employé non reconnu, contactez votre administrateur </p>";
                }
                ?>
  
</div>
    
    
</body>
</html>
