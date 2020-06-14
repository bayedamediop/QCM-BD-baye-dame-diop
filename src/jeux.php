<?php
session_start();
$idjueur=$_SESSION['user']['id'];

$p=isset($_GET['p'])?$_GET['p']:'';
if (!isset($_SESSION['user']['password'])) {
    header('location:../index.php');
}
require_once "../db/connexion.php";
global $db;
$results = $db->query('SELECT * FROM  questions,reponses 
                  where questions.id=reponses.questions_id ');
$result= $results->fetchAll();
shuffle($result);
//var_dump(count($result));
//die();

$_SESSION['question']=[];
$_SESSION['score']=0;

$ok=true;


$_SESSION['question_total'] = count($result);
$_SESSION['limites']=5;//5
// var_dump($nbe_total);
$_SESSION['nbrquestionparpage']=1;
//   var_dump( $_SESSION['limite']);
//   $_SESSION['i']=1;
if (isset($_POST['suiv'])) {
    if ($_SESSION['courantPage']<= $_SESSION['limites']) {
        $_SESSION['courantPage']++;
    }elseif ($_SESSION['courantPage']>= $_SESSION['limites']) {
        echo "<script>alert(\"vous aavez terminer\")</script>";
        header('location:../index.php');

       // exit();
    }

}
if (isset($_POST['prec'])) {
    if ($_SESSION['courantPage']>1) {
        $_SESSION['courantPage']--;

    }
}
?>
<html>
<head>
    <title>QUIZZ</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../asset/css/jeux.css">
    <style>

    </style>
</head>
<body>
<form method="post">
<div class="container-xl" style="">
    <div class="row" style="background-color: #050505">
        <div class="col-xl-2">
            <img src="../asset/images/quizz.png " alt="" class="quizz">
        </div>
        <div class="col-xl-8" >
            <P class="p1"> LE PLAISIRE DE JOUEUR </P>
        </div>
    </div>
    <div class="col-xl-10 h-75" style="background-color: #c6c8ca ;margin-left: 100PX; margin-top:30px"  >
        <div CLASS="col-xl-18 bg-success" >
            <button type="button" class="quiz">
                <a href="deconnecte.php">Deconnecter</a>
                </button>
            <P class="p1">JOUEUR ET TESTE MON CULTURE GERALLE </P>

        </div>
        <div class="col-xl-10 bg-light  " id="contenu" style="margin-left: 30px">
            <input type="hidden" name="user_id" id="user_id" value="<?=$idjueur?>" class="form-control" />

            <?php
            $_SESSION['debut'] =  ($_SESSION['courantPage'] -1) *  $_SESSION['nbrquestionparpage'];
            $pagination = '';
            // $_SESSION['cpt'];
            for ($i = $_SESSION['debut']; $i < $_SESSION['courantPage']  && $i <$_SESSION['question_total'];  $i++) {
                if ($result[$i]['type'] == 'choixmultiple') {
                    // var_dump($result[$i]);
                    echo   ' <h1 style="text-align:center;  background-color:rgb(145, 141, 141); " > ';
                    echo "QUESTION ".$i.'/'.$_SESSION['limites']."<br>";
                     echo $result[$i]['question'] ;
                    echo   ' </h1>';
                    for ($j = 0; $j <=($result[$i]['reponse']); $j++) {
                        echo   ' </h3>';?>
                        <input type="text" name=" questions_id" id="questions_id" value="<?= $result[$i]['id'] ?>">
                      <input type="checkbox" name="rep" style="margin-left: 30px">
                        <?php
                        echo $result[$i]['reponse'][$j];
                        echo   ' </h3>';
                        echo   ' </BR>';
                    } if (isset($_POST['suiv']) && (!empty($_POST['rep']))) {
                        // unset($_POST['sub']);
                        $rep=$_POST['rep'];

                      }
                } elseif ($result[$i]['type'] == 'choixsimple') {
                    echo   ' <h1 style="text-align:center;  background-color:rgb(145, 141, 141);" > ';
                    echo "QUESTION ".$i.'/'.$_SESSION['limites']."<br>";

                    echo $result[$i]['question'];
                    echo   ' </h1>';
                    echo '<br>';
                    for ($j = 0; $j <=($result[$i]['reponse']); $j++) {
                        echo   ' </h3>'; ?>
                        <input type="text" name=" questions_id" id="questions_id" value="<?= $result[$i]['id'] ?>">
                         <input type="radio" name="rep" style="margin-left: 30px" >
                                <?php
                        echo $result[$i]['reponse'][$j];
                        echo   ' </h3>';
                        echo   ' </BR>';?>

                   <?php }
                    if (isset($_POST['suiv']) && (!empty($_POST['rep']))) {
                        // unset($_POST['suiv']);
                        $rep=$_POST['rep'];
                        //var_dump($rep);
                    }
                } elseif ($result[$i]['type'] == 'choixtext') {
                    echo   ' <h1 style="text-align:center;  background-color:rgb(145, 141, 141); " > ';
                    echo "QUESTION ".$i.'/'.$_SESSION['limites']."<br>";
                    echo $result[$i]['question'];
                    echo   ' </h1>'; ?>
            <input type="text" name=" questions_id" id="questions_id" value="<?= $result[$i]['id'] ?>">
            <textarea type="hidden" name="rep" id=""  cols="40" rows="4" style="margin-left: 30px">
                <?php
                    // echo $jsons[$i]['Varais'];
                    echo '</textarea>';
                } if (isset($_POST['suiv']) && (!empty($_POST['rep']))) {
                    // unset($_POST['suiv']);
                }
            }
            ?>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
            <input type="submit" name="action" id="action" class="btn btn-success" />
                </div>
             <div class="col-md-4">
                <input class="pagination btn btn-dark" type="submit" name="prec" value="precedant"></div>
                <div class="col-md-4">
                <input  class="pagination btn btn-success" type="submit" name="suiv"  id="suiv" value="suivant"></div>
            </div>
        </div>

    </div>
</div>

</form>
</body>
</html>
<script src="../asset/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#submit").click(function(){

            var user_id = $("#user_id").val();
            var questions_id = $("#point").val();
           // var type = $("#type").val();

            var donnes ='user_id='+user_id+'&questions_id='+questions_id;
            $.ajax({
                method : "POST",
                url : "functions/userQuestion.php",
                data : donnes,
                success : function (){
                    alert("Send");
                    console.log(donnes);
                }
            });
        });
    });
</script>