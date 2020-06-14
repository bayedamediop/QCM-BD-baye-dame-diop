<?php
require_once ('../function.php');
$cnx = getConnection() ;

if($_POST){
    $user_id = $_POST['$user_id'];
    $questions_id = $_POST['questions_id'];
    //$etat = $_POST['etat'];

    $sql = "INSERT INTO `user_questions` VALUES (null,'".$user_id."','".$questions_id."')";
    $query = $cnx->prepare($sql);
    $result= $query->execute();
    if ($result) {
        echo "votre insertion ruisite";
    }else{
        echo "echec de l insertion ruisite";
    }

}
?>