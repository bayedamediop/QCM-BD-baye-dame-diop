
      <form action="" method="POST">
     
       <div class="gene">
           <!-- <div class="gene0">
                <button type="button" class="quiz">Deconnecter</button>
                <P class="p1">S'inscrire pour teste mon culture generale </P>
           </div> -->
        
           <div class="form-group">
                <label for="nom">Name:</label>
                <input type="text" name="nom" class="form-control" id="nom">
                <span id="e_nom"></span>
           </div>
           <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" name="prenom" class="form-control" id="prenom">
                <span id="e_prenom"></span>
           </div>
           <div class="form-group">
                <label for="login">Login:</label>
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
             <input type="hidden" name="role" value="admin" id="role">
            
             <div class="form-group">
             <label for="file"></label>
                <input type="file" class="form-control-file border" name="file">
                <span id="e_no"></span>
             </div>
             <button type="submit" name="submit" id="submit" class="btn btn-success">S'inscrire</button>
         </div>
       
       </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../asset/jquery/dist/jquery.min.js"></script>
    <script>

          $(document).ready(function(){
             $("#submit").click(function(){
                 var nom = $("#nom").val();
                 var prenom = $("#prenom").val();
                 var login = $("#login").val();
                 var password = $("#password").val();
                 var cpassword = $("#cpassword").val();
                 var role = $("#role").val();
                 if (nom =="" || prenom =="" || login =="" || password =="" || role =="" ) {
                   alert ("saisire tout les champs");
                 }else
                 {
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
                 }
                 
             });
             //controle password
             
          });
        //   $(document).ready(function(){
        //      $("#submit").click(function(){
        //       var password = $("#password").val();
        //          var cpassword = $("#cpassword").val();
        //   if (password != cpassword) {
        //        $("#e_cpwd").html('ce password est different');
        //        $("#e_cpwd").show();
        //            alert('mot de passe invalider');
        //      }
        //      else{
        //       $("#e_cpwd").hide();
        //       alert('mot de passe valider');
        //      }
        //     });
        //      //controle password
             
        //   });
    </script>