<?php
require_once ('../function.php');
$cnx = getConnection() ;

if($_POST){
    $question = $_POST['question'];
    $rep = $_POST['rep'];
    $etat = $_POST['etat'];

    $sql = "INSERT INTO `reponses` VALUES (null,'".$question."','".$rep."','".$etat='1'."')";
    $query = $cnx->prepare($sql);
    $result= $query->execute();
    if ($result) {
        echo "votre insertion ruisite";
    }else{
        echo "echec de l insertion ruisite";
    }

}
?>