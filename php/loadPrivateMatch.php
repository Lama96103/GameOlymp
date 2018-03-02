<?php
    include 'data.php';
    $name = $_COOKIE['userID'];
    $sql = "SELECT * FROM matches";

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
            if($guest == -1){
                $guest = "Freilos";
            }

            if($row["hostid"] == $name){
                echo "<li class='list-group-item'>";
                if($row['played'] == 0){
                    $editBt = '<a id="' . $row["id"]  . 'EBT" class="btn btn-success btn-sm" onClick="editMatch(' . $row["id"] . ')" >End</a>';
                    echo $home . " vs " . $guest . " in " . $dis . ": " .  $gameStatus . " " . $editBt;
                }else{
                    echo $home . " vs " . $guest . " in " . $dis . ": " .  $gameStatus;
                }
                echo "</li>";
            }else if($row["guestid"] == $name){
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
    } else {
        echo "0 results or Error" . mysqli_error($link);
    }

?>