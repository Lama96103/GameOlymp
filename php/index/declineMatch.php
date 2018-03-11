<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$matchId = $_POST['matchId'];

$sql = "UPDATE matches SET played=0 WHERE id=" . $matchId;
$result= mysqli_query($link, $sql);


if (!$result) {
    die('Fehler: ' . mysqli_error($link));
}else{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
}



?>