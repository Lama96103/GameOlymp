<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$playerID = $_COOKIE['userID'];
$disID = $_POST['disID'];

//playerid, playername, disid, disname
$eintrag = "INSERT INTO applylist (`playerid`, `disid`) VALUES (" . $playerID . ", " . $disID . ")";

$eintragen = mysqli_query($link, $eintrag);

if (!$eintragen) {
    die('Ungültige Anfrage: ' . mysqli_error($link));
}

?>
