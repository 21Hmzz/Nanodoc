
<?php

include '../script/bdd.php';

    $username=$_SESSION['username'];
    $requete_select="SELECT * FROM compte";
    $execution_requete=mysqli_query($db,$requete_select);
    //var_dump($execution_requete);
    $resultat_requete=mysqli_fetch_array($execution_requete);
    //var_dump($resultat_requete['Username']);
  
    if(isset($_POST['selectmsg'])){
         $_SESSION['destinataire']=$_POST['selectmsg'];
         if (isset($_SESSION['destinataire'])){
             $destinataire=$_SESSION['destinataire'];?>
             <?php
            }
             /*if(!empty($_POST['message'])){
                 echo"ok";
                 $message= htmlspecialchars($_POST['message']);
                 $inserermsg="INSERT INTO messagerie (Contenu, id_destinataire, id_auteur) VALUES ('$message','$destinataire','$username')";
                 $execmsg=mysqli_query($db,$inserermsg);
                 var_dump($inserermsg);
                 ?>
             <?php
        }*/
    }
			?>	
 <?php 
            // if(isset($destinataire)){echo "<h1> Vos messages avec " .$destinataire."</h1>";}  ?>

            
                    <?php 
                    if (isset($destinataire)){
                    $recuperermsg="SELECT * FROM messagerie WHERE id_auteur='$username' AND id_destinataire='$destinataire'"  ;
                    $recuperermsg1="SELECT * FROM messagerie WHERE id_destinataire='$destinataire'";
                    $excrecupmsg=mysqli_query($db,$recuperermsg);
                    $excrecupmsg1=mysqli_query($db,$recuperermsg1);
                    //var_dump($recuperermsg1);
                    $date = date('d-m-y h:i:s');
                    //var_dump($date);
                    while($recup=mysqli_fetch_array($excrecupmsg)){
                        ?>
                        <p><?php echo $recup['Contenu'];?></p>
                        <br>

                    <?php }} ?>
<!-- HTML FORM ET AFFICHAGE TEXTAREA -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie | NanoDoc'</title>
    <link rel="stylesheet" href="../../css/messagerie.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../Js/nanodoc.js"></script>
    <script type="text/javascript" src="../Js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- <div class="formulairemsg"> 
        <form action="" class="msg">
            <select name="selectmsg" id="" class="selectmsg">
                <?php // while ($user=mysqli_fetch_array($execution_requete)){?>
                    <option value=<?php //echo $user['Username']; ?> > <?php //echo $user['Username']; ?> </option>
                <?php //} 
                //var_dump($resultat_requete);?> 
                
                
            </select>
        </form>
    </div>-->

    
</body>
</html>




<!-- Messages et affichage php-->



                <!-- </section> 
                <form action="" method="POST" class="textzone">
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <input type="submit" name="validmsg">
            </form>
            

                
            
        

        
    </div>-->
    <div class="container clearfix">
    <div class="people-list" id="people-list">
      <form class="search" action="" method="POST">
          <select name="selectmsg" id="selectmsg">
          <?php while ($user=mysqli_fetch_array($execution_requete)){?> 
            <option value="<?php echo $user['Username']; ?>"><?php echo $user['Username']; ?></option> 
            <?php } ?>
          </select>
          <input type="submit">
        <!-- <input type="text" placeholder="search" /> -->
        <!-- <i class="fa fa-search"></i> -->
      </div>
      <form action="">
      <ul class="list">
      <?php if (isset($destinataire)){while ($user=mysqli_fetch_array($execution_requete)){?>  
        <li class="clearfix">
          <!-- <img src="https://nanocom.go.yj.fr/baki.jfif" alt="avatar" /> -->
          <div class="about">
            <div class="name"><input  style="cursor:pointer;"type="hidden" value="<?php echo $user['Username']; ?>" name="user"><?php echo $user['Username']; ?></div>
            <div class="status">
              <i class="fa fa-circle online"></i> En ligne 
            </div>
          </div>
        </li>
        <?php }} ?>
      </ul>
      </form>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
        <!-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" /> -->
        
        <div class="chat-about">
          <div class="chat-with"><?php if(isset($destinataire)){echo " Vos messages avec " .$destinataire."";} ?></div>
          <div class="chat-num-messages">inserer NB message</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul>
        <?php while($recup=mysqli_fetch_array($excrecupmsg1)){
          echo '<li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp;
              <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
              
            </div>
            <div class="message other-message float-right">';
            
                        
                         echo $recup['Contenu'];
                        

                     
            echo'</div>
          </li>';
          } ?>
          <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
              <span class="message-data-time">10:12 AM, Today</span>
            </div>
            <div class="message my-message">
            <?php while($recup=mysqli_fetch_array($excrecupmsg)){
                        
                        echo $recup['Contenu'];
                       

                    } ?>
            </div>
          </li>
          
          
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button>Send</button>

      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

<script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
</script>
