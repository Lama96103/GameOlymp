<?php


include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$home = $_POST['home'];
$guest = $_POST['guest'];
$matchId = $_POST['matchId'];

$sql = "UPDATE matches SET pointshost=" . $home . ", pointsguest=" . $guest . ", played=1 WHERE id=" . $matchId;

$result= mysqli_query($link, $sql);
if (!$result) {
    die('Fehler: ' . mysqli_error($link));
}else{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
}

?>