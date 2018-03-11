<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$disID = $_POST['id'];
$expire = $_POST['date'];
$lastRound = 0;
$playerId = array();


$sql = "SELECT * FROM nextround where gameid = " . $disID;

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($playerId, $row['playerid']);
    }
}

if(count($playerId) < 2){
    echo 'Finished';
    $lastRound = 1;
    $addSP = "UPDATE player SET seasonpoints=seasonpoints+1 WHERE id=" . $playerId[0];
    mysqli_query($link, $addSP);
    $delM = "DELETE FROM matches where disid=' . $disID .'";
    mysqli_query($link, $delM);
    $delN = "DELETE FROM nextround where disid=' . $disID .'";
    mysqli_query($link, $delN);
    $delN = "UPDATE disciplines SET isrunning=0 where id=' . $disID .'";
    mysqli_query($link, $delN);
}
else{
    echo "Mehr als zwei";
    $round = GetRound($link, $disID);
    for($i = 0; $i < count($playerId); $i+=2){
        echo $playerId[$i] . " vs " . $playerId[$i+1];
        echo "<br>";
        $query = "INSERT INTO matches ( `hostid`, `guestid`, `disid`, `round`) VALUES (" . $playerId[$i] . ", " . $playerId[$i+1] . ", " . $disID . ", " . $round . ")";
        $finsih = mysqli_query($link, $query);

        $delPlay1 = "DELETE FROM nextround where playerid = '" . $playerId[$i] . "' AND gameid = " . $disID;
        $delPlay2 = "DELETE FROM nextround where playerid = '" . $playerId[$i + 1] . "' AND gameid = " . $disID;
        mysqli_query($link, $delPlay1);
        mysqli_query($link, $delPlay2);
    }
}



function GetRound($link, $disID){
    $id = 0;
    $sql = "SELECT round FROM website.matches where disid = " . $disID;
    $result= mysqli_query($link, $sql);

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



?>