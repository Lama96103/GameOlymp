<?php
include ('data.php');

$playerID = $_COOKIE['userID'];
$disID = $_POST['disID'];

//playerid, playername, disid, disname
$eintrag = "INSERT INTO website.applylist (`playerid`, `disid`) VALUES (" . $playerID . ", " . $disID . ")";

$eintragen = mysqli_query($link, $eintrag);

if (!$eintragen) {
    die('Ungültige Anfrage: ' . mysqli_error($link));
}

?>






