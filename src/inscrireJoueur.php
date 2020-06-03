
<!doctype html>
<html lang="fr">
  <head>
    <title>QUIZZ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../asset/css/insJoueur.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <form action="" method="POST">
      <div class="container">
      <div class="row">
      <div class="col-12">
        <img src="../asset/images/quizz.png " alt="" class="quizz">
        <P class="p1"> LE PLAISIRE DE JOUEUR </P>
      </div>
    </div>
       <div class="gene">
           <div class="gene0">
           <button type="button" class="quiz">Deconnecter</button>
        <P class="p1">S'inscrire pour teste mon culture generale </P>
           </div>
         <div class="gene1">
           <div class="form-group">
                <label for="nom">Name:</label>
                <input type="text" name="nom" class="form-control" id="nom">
                <span class="e_nom" style="float: right;"></span>
           </div>
           <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" name="prenom" class="form-control" id="prenom">
                <span class="e_prenom" style="float: right;"></span>
           </div>
           <div class="form-group">
                <label for="login">Ligin:</label>
                <input type="text" name="login" class="form-control" id="login">
                <span id="e_login"></span>
           </div>
            <div class="form-group">
                <label for="Password" >Password:</label>
                <input type="password" name="password" class="form-control" id="password">
                <span class="e_password" style="float: right;"></span>
             </div>
             <div class="form-group">
                <label for="cpassword">confirmer votre password:</label>
                <input type="cpassword" name="cpassword" class="form-control" id="cpassword">
                <span class="cpassword" style="float: right;"></span>
              </div>
             <input type="hidden" name="role" value="jeux" id="role">
            
             <div class="form-group">
             <label for="file"></label>
                <input type="file" class="form-control-file border" name="file">
                <span class="e_no"></span>
             </div>
             <button type="submit" name="submit" id="submit" class="btn btn-success">S'inscrire</button>
         </div>
         
         <div class="gene2"> UDQIJIFOSJIOFIJ</div>
       </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       </form>
    <script src="../asset/jquery/dist/jquery.min.js"></script>
    <script src="../asset/ajax/valideIns.js"></script>
    <script>

          $(document).ready(function(){
             $("#submit").click(function(){
                 var nom = $("#nom").val();
                 var prenom = $("#prenom").val();
                 var login = $("#login").val();
                 var password = $("#password").val();
                 var cpassword = $("#cpassword").val();
                 var role = $("#role").val();
                 
                    var donnes ='nom='+nom+'&prenom='+prenom+'&login='+login+'&password='+password+'&role='+role;
                    $.ajax({
                        type : "POST",
                        url : "functions/insertion.php",
                        data : donnes,
                        success : function (){
                            alert("Send");
                            console.log(donnes);
                        }
                    });
                 
                 
             });
             //controle password
             
          });
          $(document).ready(function(){
             $("#submit").click(function(){
              var password = $("#password").val();
                 var cpassword = $("#cpassword").val();
          if (password != cpassword) {
               $("#e_cpwd").html('ce password est different');
               $("#e_cpwd").show();
                   alert('mot de passe invalider');
             }
             else{
              $("#e_cpwd").hide();
              alert('mot de passe valider');
             }
            });
             //controle password
             
          });
    </script>
</body>
</html>