
<?php
require_once "../db/connexion.php";
global $db;
$results = $db->query('SELECT * FROM  questions');
$resultss = $db->query('SELECT * FROM  questions');

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

<form action="" method="POST" id="forme" >
    <div class="row">
        <div  >
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

        <div id="choix" class="col-ms-8">
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
                    '<input type="checkbox" id="row'+i+'" name="rep[]">',
                    'Etat',
                    '<input  type="checkbox" id="etet" name="etat" checked="checked">',
                    '</button id="btn-remove">',
                    '<img  src="../asset/images/ic-supprimer.png\">',
                    '</button >');
            }
            if(type =="choixsimple"){
                // alert($("#typ"));
                i=i+1;
                $("#choix").append('<input type="text" id="row'+i+'"  name="rep[]" class="rep" placeholder="Réponse'+i+'" style=width:230px; float:left; height: 30px;">',
                    '<input type="radio" id="row'+i+'" name="rep[]">',
                    'Etat',
                    '<input  type="checkbox" id="etet" name="etat" checked="checked">',
                    '</button  id="btn-remove">',
                    '<img src="../asset/images/ic-supprimer.png\">',
                    '</button >' );
            }
            if(type =="choixtext"){
                // alert($("#typ"));

                $("#choix").append('<textarea name="rep" placeholder="Réponse" style=width:230px; float:left; height: 30px;></textarea>' );
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
            var i = 0;
            $.ajax({
                method : "POST",
                url : "functions/reponse.php",
                data : donnes,
                success:function(data) {
                    //Nécessite d'avoir les informations du tableau dans le
                    //même ordre que les inputs

                    $('input.ajax').each(function(){
                        $(this).val(data[i]);
                        i++;
                    });
                }
            });
        });
    });
</script>
</body>
</html>