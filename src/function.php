<?php
// co²nnection dans la basse de donnees
function getConnection()
    {
        $dbName = "quizz_bayedame_diop";
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
/**
 * @param $table
 * @return array
 * Recuperer tous les resultats qui sont dans $table
 */
function getAll()
{
    return getConnection()->query("SELECT * FROM utilisateur")->fetchAll();
}

function connection($login,$pwd){
    $c=getAll();
//   var_dump($c['nom']);
  for ($i=0; $i < count($c); $i++) { 
    
       if($c[$i]['login']===$login && $c[$i]['password']===$pwd){
           $_SESSION['statut']="login";
           if($c[$i]['role']==="admin"){
            return "admin";
            return $c[$i];
           }elseif($c[$i]['role']==="jeux"){
            return "jeux";
            return $c[$i];
           }else{
               return "error";
           }
       }
            
        }
    }
    function user($login,$pwd){
        $c=getAll();
        for ($i=0; $i < count($c); $i++) {         
           if($c[$i]['login']===$login && $c[$i]['password']===$pwd){
               return $c[$i];
           break;
        }
           
        }
        return null;    
    }

    function insert($table,$prams)
{
    $sets = join(",",array_map(function ($key){
        return "$key=:$key";
    },array_keys($prams)));

   $req = "INSERT INTO $table SET $sets";
   $stm = getConnection()->prepare($req);
   return $stm->execute($prams);
}
?>
