 <?php include '../script/bdd.php';
 include '../script/infoducompte.php';
 
 if (isset($_SESSION['username'])){
    
     
   
 }else{
   header("Location: ../../index.php");
 }
 if(isset($_SESSION['gerant'])){
         
         
             header("Location: principaleadmin.php");

         
     } ?>


 <meta http-equiv="refresh" content="250; URL=principale.php">
 <!DOCTYPE html>
 <html lang="fr">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../css/test.css">
   <script type="text/javascript" src="../../Js/test.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
   <title>Accueil | NanoDoc'</title>
 </head>

 <body>

   <div class="wrapper">

     <nav id="mySidenav" class="sidenav">

       <header>
         <span></span>
         <?php echo $username; ?>
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       </header>

       <ul>
         <li><span>Menu</span></li>
         <li><a class="active">Tableau de bord</a></li>
         <li><a href="../../chat/principalechat.php">Messagerie</a></li>
         <li><a href="documents.php">Documents</a></li>
         <li><a href="settings.php">Réglages</a></li>
         <li><a>*fonction en developpement*</a></li>
         <!-- <li><a>*fonction en developpement*</a></li> -->
         <!-- <li><a>*fonction en developpement*</a></li> -->
         <li><span>Autre</span></li>
         <!-- <li><a>*fonction en developpement*</a></li>
      <li><a>*fonction en developpement*</a></li> -->
         <li><a onclick="location.href='principale.php?deconnexion=true'">Déconnexion</a></li>
         <?php if (isset($_GET['deconnexion'])) {
            if ($_GET['deconnexion'] == true) {
              session_unset();
              header("location:../../index.php");
              $_SESSION['username'] = null;
              $_SESSION['gerant'] = null;
              setcookie('userck', time() - 3600);
            }
          } ?>
       </ul>

     </nav>

     <script>
       function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
       }

       function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
       }
     </script>

     <main>

       <h1><span class='openbtn' style="font-size:30px;cursor:pointer;color:white;padding: 5px" onclick="openNav()">&#9776; </span>NanoDoc'</h1>

       <div class="flex-grid">
         <div class="info">
           <h2>Mes Informations</h2>
           <ul>
             <li> <strong>Nom </strong> : <?php echo $resulatinfo["nom"]; ?> </li>
             <li><strong>Prenom </strong> : <?php echo $resulatinfo["prenom"]; ?></li>
             <li><strong>Matricule </strong> : <?php echo $resulatinfo["Matricule"]; ?></li>
             <li><strong>Adresse email </strong> : <?php echo $resulatinfo["mail"]; ?></li>
             <li><strong>Téléphone </strong> : <?php echo $resulatinfo["Numero"]; ?></li>
           </ul>

         </div>
<div style="overflow:auto;">
         
           <h2>Fiche de paie</h2>
           <?php include '../script/listepaie.php'; ?>





           
           <div class="doc">
             <h2>Documents</h2>
             <?php include '../script/listedoc.php'; ?>
             

           </div>
           
           <div class="doc">
             <h2>Documents Reçus</h2>
             <?php include '../script/listedocrecu.php'; ?>
           </div>
</div>
         
        



     </main>

   </div>
 </body>

 </html>
