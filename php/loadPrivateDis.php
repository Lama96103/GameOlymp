<?php
include ('data.php');

$playerId = $_COOKIE['userID'];

$sql = "SELECT * FROM website.applylist where playerid = " . $playerId;

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        if($row['playerid'] == $playerId){
            $editBt = '<div class="col-sm-4"><a id="' . $row["disid"]  . 'P" class="btn btn-success float-right" onClick="RemoveDis(' . $row["disid"]  . ')" >Remove</a></div>';
            
            echo "<li class='list-group-item bg-dark text-white'><div class='row'><div class='col-sm-8'>" . GetDisName($row["disid"], $link) . "</div>" . $editBt . "</div></li>";
        }
        
    }
} else {
    echo "<li class='list-group-item'>You didn't sign into a discipline yet</li>" . mysqli_error($link);
}

mysqli_close($link);

?>

