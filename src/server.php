<?php 
    function getConnection()
    {
        $dbName = "mini_projet";
       $host  = "localhost";
       $usename = "root";
       $password = "";
    //    $connection ;
       $connection = null ;
       try {
           $connection = new PDO('mysql:host='.$host.';dbname='.$dbName,$usename,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       } catch (PDOException $exeption) 
       {
           echo "Erreurr :".$exeption->getMessage() ;
       }

      return $connection ;

    }
    $cnx = getConnection() ;
   
    if($_POST){
        $nom = $_POST['nom']; 
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $file = $_POST['photo'];
        $cnx = getConnection() ;

        $sql = "INSERT INTO `use` VALUES (null,'".$nom."','".$prenom."',
        '".$login."','".$password."','".$role."','".$file."')";
        $query = $cnx->prepare($sql);
        $query->execute();











        /*
        $contenu = file_get_contents("json.json");
        $contenu = json_decode($contenu,true);
        $contenu[] = ['nom'=> $nom,'prenom'=> $prenom];
        $contenu = json_encode($contenu);
        file_put_contents('json.json',$contenu);
        */
    }

    

?>