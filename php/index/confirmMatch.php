<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$matchId = $_POST['matchId'];

$sql = "UPDATE matches SET  confirmed=1 WHERE id=" . $matchId;
$result= mysqli_query($link, $sql);

SetForNewRound($link, $matchId);

if (!$result) {
    die('Fehler: ' . mysqli_error($link));
}else{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
}

function SetForNewRound($link, $id){
    $sql =  "SELECT * FROM matches where id=" . $id;

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $home = $row['pointshost'];
            $guest = $row['pointsguest'];
            $points =  CalcPoints($row['round']);
            if($home > $guest){
                $eintrag = "INSERT INTO nextround (`playerid`, `gameid`) VALUES ('". $row['hostid'] ."', ". $row['disid'] .")";
                $playerPoints = "UPDATE player SET seasonpoints=seasonpoints+". $points . " WHERE id=" . $row['guestid'];
            }else if($home < $guest){
                $eintrag = "INSERT INTO nextround (`playerid`, `gameid`) VALUES ('". $row['guestid'] ."', ". $row['disid'] .")";
                $playerPoints = "UPDATE player SET seasonpoints=seasonpoints+". $points . " WHERE id=" . $row['hostid'];
            }
            mysqli_query($link, $eintrag);
            mysqli_query($link, $playerPoints);
        }
    }
}

function CalcPoints($round){
  return pow(2, $round);
}

?>
