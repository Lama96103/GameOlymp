<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$disID = $_POST['id'];
$expire = $_POST['date'];
$playerIDs = array();

$disName = GetDisName($disID, $link);

echo $disID;
echo "<br>";
echo $expire;
echo "<br>";
echo $disName;
echo "<br>";


$sql = "SELECT * FROM applylist where disid = " . $disID;

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            array_push($playerIDs, $row['playerid']);
    }
}
$tourID = SetTournament($link, $disID);
if($tourID == -1){
    die("ERROR");
}
$playerNum = GetPlayerMax($link, $disID);
$walkover = GetWalkoverNum($playerNum, GetDisSize($playerNum));

for($i = 0; $i < count($playerIDs); $i+=2){
    if($walkover > 0){
        $query = "INSERT INTO matches  ( `hostid`, `guestid`, `disid`, `played`, `confirmed`, `expiredate`, `tourid`)
                  VALUES ( " . $playerIDs[$i] . ", -1, " . $disID . ", 1, 1, '" . $expire . "', ".$tourID.")";
        $delPlay1 = "DELETE FROM applylist where playerid = '" . $playerIDs[$i] . "' AND disid = " . $disID;
        mysqli_query($link, $delPlay1);
        $eintrag = "INSERT INTO nextround (`playerid`, `gameid`) VALUES ('". $playerIDs[$i] ."', ". $disID .")";
        mysqli_query($link, $eintrag);
        $walkover--;
        $i --;
    }else{
        $query = "INSERT INTO matches ( `hostid`, `guestid`, `disid`, `expiredate`, `tourid`)
                  VALUES (" . $playerIDs[$i] . ", " . $playerIDs[$i+1] . ", ". $disID .", '" . $expire . "', ".$tourID.")";
        $delPlay1 = "DELETE FROM applylist where playerid = '" . $playerIDs[$i] . "' AND disid = " . $disID;
        $delPlay2 = "DELETE FROM applylist where playerid = '" . $playerIDs[$i + 1] . "' AND disid = " . $disID;
        mysqli_query($link, $delPlay1);
        mysqli_query($link, $delPlay2);
    }
    mysqli_query($link, $query);
}

NewsForStartTournament($link, $disID, $tourID);
SetDisStarted($disID, $link);

function SetTournament($link, $disID){
      $today = getdate();
      $date = $today['year'] . "-" . $today['mon'] . "-" . $today['mday'] . "-";
      $sql = "INSERT INTO tournaments (`disid`, `start`) VALUES (". $disID .", '".$date."')";
      mysqli_query($link, $sql);

      $getID = "SELECT id FROM tournaments where disid=". $disID ." AND start='". $date ."' AND finished=0";
      $result = mysqli_query($link, $getID);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
                  return $row['id'];
          }
      }else{
        return -1;
      }
}

function GetPlayerMax($link, $disID){
    $num = 0;
    $sql = "SELECT * FROM applylist where disid = " . $disID;
    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $num ++;
        }
    }

    return $num;
}

function GetDisSize($playerNum){
    $i;
    for($i = 4; $playerNum > $i; $i *= 2){

    }
    return $i;
}

function GetWalkoverNum($playerNum, $disSize){
    $walkover = $disSize - $playerNum;
    return $walkover;
}


function SetDisStarted($disID, $link){
    $sql = "UPDATE disciplines SET isrunning=1 WHERE id=" . $disID;
    mysqli_query($link, $sql);
 }

 function NewsForStartTournament($link, $disID, $tourID){
     $header = GetDisName($disID, $link);
     $info = "A new Tournament has started";
     $key = "#" . $tourID;
     GenerateNews($link, $header, $info, $key);
 }


?>
