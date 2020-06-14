<?php
//Database connection by using PHP PDO

require_once ('../function.php');
$connection = getConnection() ;
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
    //For Load All Data
    if($_POST["action"] == "Load")
    {

        $statement = $connection->prepare("SELECT * FROM utilisateur ORDER BY id DESC  ");
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
        $output .= '
   <table class="table table-bordered">
    <tr>
     <th style="width: 60%">First Name</th>
     <th width="4%">Last Name</th>
     <th width="">Update</th>
     <th width="">Delete</th>
    </tr>
  ';
        if($statement->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $output .= '
    <tr>
     <td>'.$row["nom"].'</td>
     <td>'.$row["prenom"].'</td>
     <td><button type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs update" style="width: 70px">Update</button></td>
     <td><button type="button" id="'.$row["id"].'" class="btn btn-danger btn-xs delete" style="width: 70px">Delete</button></td>
    </tr>
    ';
            }
        }
        else
        {
            $output .= '
    <tr>
     <td align="center">Data not Found</td>
    </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    //This code for Create new Records
    if($_POST["action"] == "Create")
    {
        $statement = $connection->prepare("
   INSERT INTO utilisateur (nom, prenom, login, password, role) 
   VALUES (:nom, :prenom: login, :password: role)
  ");
        $result = $statement->execute(
            array(
                ':nom' => $_POST["nom"],
                ':prenom' => $_POST["prenom"],
                ':login' => $_POST["login"],
                ':password' => $_POST["password"],
                ':role' => $_POST["role"],
                ':file' => $_FILES["file"],
            )
        );
        if(!empty($result))
        {
            echo 'Data Inserted';
        }
    }

    //This Code is for fetch single customer data for display on Modal
    if($_POST["action"] == "Select")
    {
        $output = array();
        $statement = $connection->prepare(
            "SELECT * FROM utilisateur 
   WHERE id = '".$_POST["id"]."' 
   LIMIT 1"
        );
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            $output["nom"] = $row["nom"];
            $output["prenom"] = $row["prenom"];
        }
        echo json_encode($output);
    }

    if($_POST["action"] == "Update")
    {
        $statement = $connection->prepare(
            "UPDATE uyilisateur 
   SET nom = :nom, prenom = :prenom 
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':nom' => $_POST["nom"],
                ':prenom' => $_POST["prenom"],
                ':id'   => $_POST["id"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }

    if($_POST["action"] == "Delete")
    {
        $statement = $connection->prepare(
            "DELETE FROM utilisateur WHERE id = :id"
        );
        $result = $statement->execute(
            array(
                ':id' => $_POST["id"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Deleted';
        }
    }

}

?>
