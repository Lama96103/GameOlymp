<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";
$name = $_COOKIE['userID'];
$sql = "SELECT * FROM matches";
$noMatch = true;

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row['played'] == 0 && $row['confirmed']== 0){
            $gameStatus = 'PENDING';
        }else if($row['played'] == 1 && $row['confirmed']== 1){
            $gameStatus = $row['pointshost'] . " : " . $row['pointsguest'];
        }else{
            $gameStatus = $row['pointshost'] . " : " . $row['pointsguest'] . ' - Not Confirmed';
        }

        $home = GetPlayerName($row["hostid"], $link);
        $guest = GetPlayerName($row["guestid"], $link);
        $dis = GetDisName($row["disid"], $link);
        $active = CheckActiveMatch($link, $row['tourid']);
        if($guest == -1){
            $guest = "Freilos";
        }

        if($row["hostid"] == $name && $active){
            echo "<li class='list-group-item'>";
            if($row['played'] == 0){
                $editBt = '<a id="' . $row["id"]  . 'EBT" class="btn btn-success btn-sm" onClick="editMatch(' . $row["id"] . ')" >End</a>';
                echo $home . " vs " . $guest . " in " . $dis . ": " .  $gameStatus . " " . $editBt;
            }else{
                echo $home . " vs " . $guest . " in " . $dis . ": " .  $gameStatus;
            }
            echo "</li>";
            $noMatch = false;
        }else if($row["guestid"] == $name && $active){
            $noMatch = false;
            echo "<li class='list-group-item'>";
            if($row['confirmed'] == 0 && $row['played'] == 1){
                $confBt = '<a id="' . $row["id"]  . 'EBT" class="btn btn-success" onClick="confirmMatch(' . $row["id"] . ')" >Confirm</a>';
                $declBt = '<a id="' . $row["id"]  . 'EBT" class="btn btn-danger" onClick="declineMatch(' . $row["id"] . ')" >Decline</a>';
                $BtGroup = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">'. $confBt . $declBt . '</div>';
                echo $home . " vs " . $guest . " in " . $dis . ": " .  $gameStatus . " " . $BtGroup;
            }else{
                 echo $home . " vs " . $guest . " in " . $dis . ": " .  $gameStatus;
            }
            echo "</li>";
        }
      }
}

if($noMatch){
  echo "<p class='text-white'> Sorry, you don't have any Match at the moment. Please participate in a Discipline</p>";
}


function CheckActiveMatch($link, $tourID){
    $sql = "SELECT finished FROM tournaments WHERE id=" . $tourID;
    $result = mysqli_query($link, $sql);
    if(!$result){
        return true;
    }else{
        $row = mysqli_fetch_row($result);
        if($row[0] == 0){
            return true;
        }else{
          return false;
        }
    }
}

?>
