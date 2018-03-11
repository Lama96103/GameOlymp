<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$playerID = $_COOKIE['userID'];
$disID = $_POST['disID'];

$eintrag = "DELETE FROM website.applylist where playerid = " . $playerID . " AND disid = " . $disID;

$eintragen = mysqli_query($link, $eintrag);

if (!$eintragen) {
    die('Ungültige Anfrage: ' . mysqli_error($link));
}

?>