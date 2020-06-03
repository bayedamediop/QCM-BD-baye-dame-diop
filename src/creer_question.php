
<?php 
require_once('function.php');
//  session_start();
 $nouveau=[];
 if (isset($_POST['submit'])){

   $qustion=$_POST['question'];
   $score=$_POST['score'];
   $type=$_POST['type'];
   $reponse=$_POST['rep'];
   $vrais=$_POST['vrais'];
   $nouveauQuestion=[
       'Question'=>$qustion,
       'Score'=>$score,
       'type'=>$type,
       'Reponse'=>$reponse,
        'Varais'=>$vrais
      
   ];
         $json=file_get_contents('../asset/json/question.json');
         $nouveau=json_decode($json,true);
         $nouveau[]=$nouveauQuestion;
         $nouveauEncode=json_encode($nouveau);
        file_put_contents('../asset/json/question.json',$nouveauEncode);
   
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/question.CSS">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>

</head>
<body>

 
<!-- <div class="container"> -->

  <form action="" method="POST" >
  <div class="row">
      <div class="col-75">
        <label for="question">Questions</label>
      </div>
      <div class="form-group">
        <textarea class="form-control" id="question" name="question" style="height:60px"></textarea>
      </div>
      </div>
      <br>
    <br>
      <div class="row">
      <div >
        <label  for="Score">Score</label>
      </div>
      <div class="form-group">
        <input class="form-control" type="number" id="score" name="score" style="height:20px">
      </div>
      </div>
    
   <div id="inputs" >
    <div class="row">
      <div class="col-25">
        <label for="type">Type</label>
      </div>
      <div  id="ty">
        <select  style="width: 280px; height: 30px;"class="form-group  " id="typ" name="type">
        <option value="">Choix la Type de Question</option>
  
          <option value="choixmultiple">choix multiple </option>
         <option value="choixsimple">choix simple </option>
        <option value="choixtext">choix text</option>

     </select> 

              <button type="button" class="button" onclick="genere()">
              <img src="../asset/Images/ajout.png"alt="" class="add" style="margin-left: 0px;">
            </button>

      </div>
    </div>
    </div>
          <div class="row">
          <div class="col-25">
                </div>
                <div id="choix" class="col-75">
                </div>
          </div>
         <div class="row">
                    <input type="submit" name="submit" value="Submit">
             </div>
                  </div>
                  <script src="asset/jquery/dist/jquery.min.js"></script>
           <script type="text/javascript">
           
                var i=0;
             function genere(divName ){
               
             var choix=document.getElementById ("choix");
             choix.innerHtml="";
            // var reponse =document.getElementById ("reponse").value;
             var typ =document.getElementById ('typ').value;
             var divInputs = document.getElementById('inputs');
              
             //choixmultiple
             
              // if(typ==='choixmultiple'){
               
                // var newInput = document.createElement('div');
                var champ = "champ" + i;
        var newdiv = document.createElement('div');
        var valeur = document.getElementById('typ').value;
        if (typ === "choixmultiple") {
            newdiv.innerHTML = "<div id=\"champ" + i + "\" class=\"nbQuestionNew\">" +
                "<label class=\"label\" for=\"reponse" + i + "\">Réponse" + i + "</label>" +
                "<input class=\"labelReponse\" type=\"text\" name=\"rep[]\" >" +
                " <input type=\"checkbox\" name=\"vrais[]\"> " +
                
                " <button class=\"delete\" onClick=\"suprimer('champ" + i + "');\">"+
                " <img src=\"../asset/Images/icone/ic-supprimer.png\">"+
                "</button> </div>";
            divInputs.appendChild(newdiv);
            // increment(i)
            i++
        } else if (typ === "choixsimple") {
            i = 1;
            newdiv.innerHTML = "<div id=\"champ" + i + "\" class=\"nbQuestionNew\">" +
                "<label class=\"label\" for=\"typeReponse" + i + "\">Réponse" + i + "</label>" +
                "<input class=\"labelReponse\" type=\"text\" name=\"rep[]\" >" +
                "<input  class=\"radio\" type=\"radio\" name= \"vrais[]\" >" +
                " <button class=\"delete\" onClick=\"suprimer('champ" + i + "');\">"+
                " <img src=\"../asset/Images/icone/ic-supprimer.png\">"+
              " </button> </div>";
                divInputs.appendChild(newdiv);
            // increment(i)
            i++
        } else if (typ === "choixtext") {
            if (i <= 1) {
                newdiv.innerHTML = "<div id=\"champ" + i + "\" class=\"nbQuestionNew\">" +
                    "<label class=\"label\" for=\"reponse \">Réponse</label>" +
                    "<textarea  class=\"area\" name=\"rep\"></textarea>" +
                    // " <button class=\"delete\" onClick=\"suprimer('champ" + i + "');\"></button> </div>";
                    divInputs.appendChild(newdiv);
                // increment()
            }
        } else {
            alert('le type de réponse est obligatoire  ');
        }
    }
             
           </script>     
</body>
</html>