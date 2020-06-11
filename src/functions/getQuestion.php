<?php

require_once "../../db/connexion.php";
global $db;

$limit = $_POST['limit'];
$offset = $_POST['offset'];
$date = $_POST['date'];


$sql = "
            SELECT * 
            FROM questions 
            ORDER BY id DESC
            LIMIT {$limit} 
            OFFSET {$offset}
    ";

$req = $db->query($sql);
$result = $req->fetchAll(2);

echo json_encode($result);

