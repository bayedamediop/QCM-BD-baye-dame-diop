

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
                        url : "src/functions/insertion.php",
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


