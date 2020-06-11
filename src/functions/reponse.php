<?php
require_once ('../function.php');
$cnx = getConnection() ;

if($_POST){

    $question = $_POST['question'];
    $rep = $_POST['rep'];
    $etat = $_POST['etat'];
    $cnx = getConnection() ;
    $sql = "INSERT INTO `reponses` VALUES (null,'".$question."','".$rep."','".$etat."')";
    $query = $cnx->prepare($sql);
    $result= $query->execute();
    if ($result) {
        echo "votre insertion ruisite";
    }else{
        echo "echec de l insertion ruisite";
    }




    /*
    $contenu = file_get_contents("json.json");
    $contenu = json_decode($contenu,true);
    $contenu[] = ['nom'=> $nom,'prenom'=> $prenom];
    $contenu = json_encode($contenu);
    file_put_contents('json.json',$contenu);
    */
}



?>