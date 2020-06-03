
    $(document).ready(function(){
        $("#submit").click(function(){
          // var login = $("#login").val();
          //   var password = $("#password").val();
          valider = true;
            if ($("#nom").val() == "") {
             $("#nom").next(".e_nom").fadeIn().text
             (" champ!!!").css("color","#ff0000");
             valider =false;
            }
            else{
                $("#nom").next(".e_nom").fadeOut();
            }
            if ($("#prenom").val() == "") {
                $("#prenom").next(".e_prenom").fadeIn().text
                ("Veuillez remplire se champ!!!").css("color","#ff0000");
                valider =false;
               }
               else{
                   $("#prenom").next(".e_prenom").fadeOut();
               }
               if ($("#login").val() == "") {
                $("#login").next(".e_login").fadeIn().text
                ("Veuillez remplire se champ!!!").css("color","#ff0000");
                valider =false;
               }
               else{
                   $("#login").next(".e_login").fadeOut();
               }
            if ( $("#password").val() == "") {
              $("#password").next(".e_password").fadeIn().text
             ("Veuillez remplire se champ!!!").css("color","#ff0000");
             valider =false;
            }
            else{
                $("#password").next(".e_password").fadeOut();
            }
            if ( $("#cpassword").val() == "") {
                $("#cpassword").next(".e_cpassword").fadeIn().text
               ("Veuillez remplire se champ!!!").css("color","#ff0000");
               valider =false;
              }
              else{
                  $("#cpassword").next(".e_cpassword").fadeOut();
              }
             return valider; 
           
        });
     });