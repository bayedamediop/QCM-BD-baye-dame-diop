
    $(document).ready(function(){
        $("#btn_valider").click(function(){
          valider = true;
            if ($("#login").val() == "") {
             $("#login").next(".login_erreur").fadeIn().text
             ("Veuillez remplire se champ!!!").css("color","#ff0000");
             valider =false;
            }
            else{
                $("#login").next(".login_erreur").fadeOut();
            }
            if ( $("#pwd").val() == "") {
              $("#pwd").next(".pwd_erreur").fadeIn().text
             ("Veuillez remplire se champ!!!").css("color","#ff0000");
             valider =false;
            }
            else{
                $("#pwd").next(".pwd_erreur").fadeOut();
            }
             return valider; 
           
        });
     });