<?php 
    session_start();
    require_once('src/function.php');
    $_SESSION['pageCourant']=1;
    $_SESSION['courantPage']=1;
    $_SESSION['user'] = [];
    if(isset($_POST['btn'])){
      
            $login=$_POST['login'];
            $pwd=$_POST['password'];
          if( $result=connection($login,$pwd)){
    
              if($result=="admin"){
                 $_SESSION['user']=user($login,$pwd);
           
                        header("location:src/admin.php");
                 } 
                  if($result=="jeux"){
                            $_SESSION['user']=user($login,$pwd);
                            header("location:src/jeux.php");
                        }
           }else{
                 echo "votre login est incorrecte!!";
                 header("location:index.php");
          }
        }
    ?>
<!doctype html>
<html lang="en">
  <head>
    <title>QUIZZ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="asset/css/index.css">
   <!-- <link rel="stylesheet" href="asset/css/insAdmin.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="asset/jquery/dist/jquery.min.js"></script>
  </head>
  <body>
    
  <div class="container">
    <div class="row">
      <div class="col-12">
        <img src="asset/images/quizz.png " alt="" class="quizz">
        <P class="p1">VELCOME TO HOME  PAGEA OF OUER QUIZZ </P>
      </div>
    </div>
    <div class="cadre">
      <div class="col-md-6">
        <div class="login">
          <img src=" asset/images/quizz.png" alt="" class="img">
        <form action="" method="POST" >
            <div class="form-group">
              <label for="login">login:</label>
              <input type="login" name="login" class="form-control" id="login" placeholder="Enter login" name="login">
              <span class="login_erreur"></span>
            </div>
            <div class="form-group">
              <label for="Password">Password:</label>
              <input type="password"name="password"  class="form-control" id="pwd" placeholder="Enter password" name="Password">
              <span class="pwd_erreur"></span>
            </div>
          
            <button type="submit" name="btn" class="btn btn-primary" id="btn_valider" >Connecter</button>
            <a href="src/inscrireJoueur.php" class="a">Créer Compte joueur</a>
          </form>
        </div>
      </div>
      <div class="colj-md-4">
       <div class="design">
       <h1>LE PLUS GRAND </h1>
        <img src="asset/images/quizz1.jpg" alt="" class="src">
        <h1>EN AFFRIQUE </h1>
       </div>
      </div>
    </div>
  
</div>

    <!-- Optional JavaScript -->
    
    <script src="asset/ajax/valideIndex.js"></script>
    
  </body>
</html>