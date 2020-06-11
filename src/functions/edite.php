<?php
require_once "../../db/connexion.php";
global $db;
$id = $_GET['id'];
var_dump($id);
$freq_sql = "SELECT nom,prenom FROM utilisateur WHERE id=".$id;
$result_freq = $db->query($freq_sql);
$nom = $_POST['nom'];
$prenom = $_GET['prenom'];
var_dump($nom);
$sql = "UPDATE utilisateur SET nom='{$nom}', prenom='{$prenom}' WHERE id=".$id;
$query = $db->prepare($sql);
$result= $query->execute();
?>