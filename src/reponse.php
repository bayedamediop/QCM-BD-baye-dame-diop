<?php
require_once "../db/connexion.php";
global $db;
$results = $db->query('SELECT * FROM  questions');
$resultss = $db->query('SELECT * FROM  questions');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/question.CSS">
      <title>Document</title>

</head>
<body>
<form action="" method="POST" id="forme" >
    <div class="row">
        <div  CLASS="" >
            <select  class="form-control  " id="question" name="question">
                <option> selecte question</option>
                <?php
                $result = $results->fetchAll();
                foreach ($result as $row) {
                    ?>
                    <option value=<?= $row['id'] ?>><?= $row['question'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
        <div class="row">
            <div  >
                <select  class="form-control  " id="type" name="type">
                    <option> selecte type de reponse</option>
                        <?php
                        $result = $resultss->fetchAll();
                        foreach ($result as $row) {
                            ?>
                            <option value=<?= $row['type'] ?>><?= $row['type'] ?></option>
                        <?php } ?>
                </select>
            </div>
                <button type="button" class="button " id="btn_add" onclick="genere()">
                    <img src="../asset/Images/ajout.png"alt="" class="add" >
                </button>
            </div>

    <div class="row">
    </div>
    <div>

        <div id="choix" name="rep[]" class="col-ms-8">
        </div>
    </div>
    <input type="submit"  class="btn btn-success " name="submit" id="submit" value="Submit">
</form >

<script src="../asset/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var i=0;
        $("#btn_add").click(function(){
            var type = $("#type").val();
            //alert(type);
            //die();
            if(type =="choixmultiple"){
                // alert($("#typ"));
                i=i+1;
                $("#choix").append('<input type="text" id="row'+i+'" name="rep[]" class="rep" placeholder="Réponse'+i+'" style=width:230px; float:left; height: 30px;">',
                    'Etat',
                    '<input  type="checkbox" id="etat" name="etat"  class="etat"  value="1">',
                    '</button id="btn-remove">',
                    '<img  src="../asset/images/ic-supprimer.png\">',
                    '</button >');
            }
            if(type =="choixsimple"){
                // alert($("#typ"));
                i=i+1;
                $("#choix").append('<input type="text" id="row'+i+'"  name="rep[]" class="rep" placeholder="Réponse'+i+'" style=width:230px; float:left; height: 30px;">',

                    'Etat',
                    '<input  type="radio" id="etat" name="etat" class="etat" value="1">',
                    '</button  id="btn-remove">',
                    '<img src="../asset/images/ic-supprimer.png\">',
                    '</button >' );
            }
            if(type =="choixtext"){
                // alert($("#typ"));

                $("#choix").append('<textarea name="rep" id="rep[]" placeholder="Réponse" style=width:230px; float:left; height: 30px;></textarea>' );
            }
        });
        $(document).on('click','#btn-remove',function(){
            var btn_id = $('this').attr("id");
            $("#row"+btn_id+"").remove();
        });
        $("#submit").click(function(){
            var question = $("#question").val();
            var rep = $(".rep").val();
            var etat = $("#etat").val();
            var donnes ='question='+question+'&rep='+rep+'&etat='+etat;
            $.ajax({
                method : "POST",
                url : "functions/reponse.php",
                data : donnes,
                success : function (){
                    alert("Send");
                    alert(donnes);
                    console.log(donnes);
                }

            });
        });
    });
</script>
</body>
</html>