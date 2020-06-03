<?php
session_start ();
// session_destroy ();
$p=isset($_GET['p'])?$_GET['p']:'creer_question';
// if (!isset($_SESSION['user']['pwd'])) {
//     header('location:../index.php');
// }
?>
<!doctype html>
<html lang="fr">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
      <div class="row">
      <div class="col-12">
        <img src="../asset/images/quizz.png " alt="" class="quizz">
        <P class="p1"> LE PLAISIRE DE JOUEUR </P>
      </div>
    </div>
    <div class="generale">
      <div class="row">
          <div class="col">
          <button type="button" class="quiz">Deconnecter</button>
             <P class="p1">CRÉER ET PARAMÉRTER VOS QUIZZ </P>
          </div>
         <div class="contenue">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ge">
                        <div class="im">
                            <!-- <?='<img  class="logo" src="'. $_SESSION['user']['file']. '" >';
                          ?> -->
                          <img class="logo" src="../asset/images/quizz.png" alt="">
                          <p class="nom">
                          <?=  $_SESSION['user']['prenom'] ;?><br>
                          <?=  $_SESSION['user']['nom'] ;?></p>
                       </div>
                       </div>  
                        <div class="ge1">
                        <div class="lists">
                          <br>
                            <a href=" ?p=liste-question" class="conte1" id="conte1">Liste Questions  </a> <br><br>
                          <a href=" ?p=inscrireAdmin" class="conte1" id="conte1" >  Creer Admin      </a><br><br>
                            <a href=" ?p=liste_joueuer" class="conte1" id="conte1" >  Liste joueurs   </a><br><br>
                          <a href=" ?p=creer_question" class="conte1"id="conte1" >Creer Questions  </a><br><br>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-7">
                    <?php
                       require_once ("$p.php"); 
                    ?>
                    </div>
                </div>
         </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </form>
    

  </body>
</html>