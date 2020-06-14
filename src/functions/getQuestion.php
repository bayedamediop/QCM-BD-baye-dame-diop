<?php

require_once "../../db/connexion.php";
global $db;

$limit = $_POST['limit'];
$offset = $_POST['offset'];
$sql = "
            SELECT * 
            FROM questions,reponses where questions.id=reponses.questions_id
            ORDER BY reponses.id DESC
            LIMIT {$limit} 
            OFFSET {$offset}
    ";

$req = $db->query($sql);
$result = $req->fetchAll(2);

echo json_encode($result);

