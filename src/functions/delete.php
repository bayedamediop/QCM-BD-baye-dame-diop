<?php
require_once "../../db/connexion.php";
global $db;
$id = $_GET['id'];
$sql = "DELETE FROM utilisateur WHERE id=" . $id;
$query = $db->prepare($sql);
  $result=$query->execute();
if( $result) {
    header("location:../admin.php");
}
exit();
