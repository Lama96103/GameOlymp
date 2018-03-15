<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$disID = $_POST['id'];
$expire = $_POST['date'];
$lastRound = 0;
$playerId = array();
$tourID = 0;


$sql = "SELECT * FROM nextround where gameid = " . $disID;

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($playerId, $row['playerid']);
    }
}

$tourID = GetTourID($link, $disID);

$round = GetRound($link, $disID, $tourID);

if(count($playerId) < 2){
    echo 'Finished';
    $lastRound = 1;
    $points = GetWinPoints($round-1);
    // Add Seasonpoints to winner;
    $addSP = "UPDATE player SET seasonpoints=seasonpoints+".$points." WHERE id=" . $playerId[0];
    mysqli_query($link, $addSP);
    // Deletes Player from Nextround
    $delPlay1 = "DELETE FROM nextround where playerid = " . $playerId[0] . " AND gameid = " . $disID;
    mysqli_query($link, $delPlay1);
    // Enables Discipline
    $delN = "UPDATE disciplines SET isrunning=0 where id=" . $disID;
    mysqli_query($link, $delN);
    // Set Tournament as Finished
    $endTour = "UPDATE tournaments SET finished=1 where id=" . $tourID;
    mysqli_query($link, $endTour);
    NewsForWinner($link, $disID, GetPlayerName($link, $playerId[0]), $tourID);
}
else{
    echo "Mehr als zwei";
    for($i = 0; $i < count($playerId); $i+=2){
        echo $playerId[$i] . " vs " . $playerId[$i+1];
        echo "<br>";
        $query = "INSERT INTO matches ( `hostid`, `guestid`, `disid`, `round`, `expiredate`, `tourid`)
                  VALUES (" . $playerId[$i] . ", " . $playerId[$i+1] . ", " . $disID . ", " . $round . ", '".$expire."', ".$tourID.")";
        $finsih = mysqli_query($link, $query);

        $delPlay1 = "DELETE FROM nextround where playerid = '" . $playerId[$i] . "' AND gameid = " . $disID;
        $delPlay2 = "DELETE FROM nextround where playerid = '" . $playerId[$i + 1] . "' AND gameid = " . $disID;
        mysqli_query($link, $delPlay1);
        mysqli_query($link, $delPlay2);
    }
    NewsForNextRound($link, $disID, $round, $tourID);
}

function GetTourID($link, $disID){
    $id = 0;
    $sql = "SELECT tourid FROM matches where disid = " . $disID;
    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row["tourid"];

        }
    }
    return $id;
}

function GetRound($link, $disID, $tourID){
    $id = 0;
    $sql = "SELECT round FROM matches where disid = " . $disID . "AND tourid = ". $tourID;
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if( $id < $row["round"]){
                $id = $row["round"];
            }
        }
    }

    $id = $id + 1;
    return $id;
}

function NewsForNextRound($link, $disID, $round, $tourID){
    $header = GetDisName($disID, $link);
    $roundStr = $round + 1;
    $info = "Round " . $roundStr . " has started";
    $key = "#" . $tourID;
    GenerateNews($link, $header, $info, $key);

}

function NewsForWinner($link, $disID, $winner, $tourID){
    $header = GetDisName($disID, $link);
    $info = "Tournament was finished. " . $winner . " got the first place";
    $key = "#" . $tourID;
    GenerateNews($link, $header, $info, $key);
}

function GetWinPoints($round){
    if($round < 1)
    return pow(2, $round);
}



?>
