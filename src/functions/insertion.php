<?php 
    require_once ('../function.php');
    $cnx = getConnection() ;

            /* Getting file name */
                $filename = $_FILES['file']['name'];
                $tmpname = $_FILES['file']['tmp_name'];
            /* Location */
            $location = "uploade/".$filename;
                /* Upload file */
                move_uploaded_file($filename,$tmpname,$location);

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $file = $_FILES['file'];

       $sql = "INSERT INTO `utilisateur` VALUES (null,'".$nom."','".$prenom."',
        '".$login."','".$password."','".$role."','".$location."')";
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

?>