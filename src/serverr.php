<?php 
    
    if($_POST){
        $nom = $_POST['nom']; 
        $prenom = $_POST['prenom'];

        $cnx = getConnection() ;

        $sql = "INSERT INTO `utilisateur` VALUES (null,'".$nom."','".$prenom."')";
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

    function getConnection()
    {
       $host  = "localhost";
       $db_name = "mini_projet";
       $usename = "root";
       $password = "";
 

       $connection  = null ;
       try {
           $connection = new PDO('mysql:host='.$host.';dname='.$db_name,$usename,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       } catch (PDOException $exeption) 
       {
           echo "Erreurr :".$exeption->getMessage() ;
       }

      return $connection ;

    }

?>