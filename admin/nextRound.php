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

$round = GetCurrentRound($link, $disID, $tourID);

if(count($playerId) < 2){
    echo 'Finished';
    echo "<br>Round: " . $round;
    echo "<br>Winner: " . GetPlayerName($playerId[0], $link);
    $lastRound = 1;
    $points = GetWinPoints($round);
    echo "<br>Points:" . $points;
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
    NewsForWinner($link, $disID, GetPlayerName($playerId[0], $link), $tourID);
}
else{
    echo "Not Finished";
    $round = $round + 1;
    echo "<br>Round: " . $round;
    for($i = 0; $i < count($playerId); $i+=2){
        echo GetPlayerName($playerId[$i], $link) . " vs " . GetPlayerName($playerId[$i+1], $link);
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

function GetCurrentRound($link, $disID, $tourID){
    $sql = "SELECT round FROM matches where disid = ".$disID." AND tourid = ".$tourID." ORDER BY round DESC";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($result);
    return $row[0];
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
    return pow(2, $round);
}



?>
