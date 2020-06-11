<?php
require_once "../../db/connexion.php";
global $db;

$limit = $_POST['limit'];
$offset = $_POST['offset'];
$date = $_POST['date'];

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $name = $_FILES['file'];
    $sql = "INSERT INTO utilisateur (nom, prenom,login,passwword,role,photo) VALUES ('{$nom}', '{$prenom}',
                       '{$login}','{$password}','{$role}','{$name}')";
    $query = $db->prepare($sql);
    $result= $query->execute();
    if ($result) {
        $id = mysqli_insert_id($db);
        $saved_comment = '<div class="comment_box">
      		<span class="delete" data-id="' . $id . '" >delete</span>
      		<span class="edit" data-id="' . $id . '">edit</span>
      		<div class="display_name">'. $nom .'</div>
      		<div class="comment_text">'. $prenom .'</div>
      	</div>';
        echo $saved_comment;
    }else {
        echo "Error: ". mysqli_error($db);
    }
    exit();
}
// delete comment fromd database
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM utilisateur WHERE id=" . $id;
    $query = $db->prepare($sql);
    $query->execute();
    exit();
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sql = "UPDATE utilisateur SET nom='{$nom}', prenom='{$prenom}' WHERE id=".$id;
    $query = $cnx->prepare($sql);
    $result= $query->execute();
    if ($result) {
        $id = mysqli_insert_id($db);
        $saved_comment = '<div class="comment_box">
  		  <span class="delete" data-id="' . $id . '" >delete</span>
  		  <span class="edit" data-id="' . $id . '">edit</span>
  		  <div class="display_name">'. $nom .'</div>
  		  <div class="comment_text">'. $prenom .'</div>
  	  </div>';
        echo $saved_comment;
    }else {
        echo "Error: ". mysqli_error($db);
    }
    exit();
}

// Retrieve comments from database
$sql ="
            SELECT * 
            FROM utilisateur 
            ORDER BY id DESC
            LIMIT {$limit} 
            OFFSET {$offset}
    ";
$req = $db->query($sql);
$result = $req->fetchAll(2);

echo json_encode($result);
$comments = '<div id="display_area">';
while ($row = mysqli_fetch_array($result)) {
    $comments .= '<div class="comment_box">
  		  <span class="delete" data-id="' . $row['id'] . '" >delete</span>
  		  <span class="edit" data-id="' . $row['id'] . '">edit</span>
  		  <div class="display_name">'. $row['nom'] .'</div>
  		  <div class="comment_text">'. $row['prenom'] .'</div>
  	  </div>';
}
$comments .= '</div>';
?>
