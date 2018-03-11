<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$playerId = $_COOKIE['userID'];

$toEcho = "Error";
$divider = "</div><div class='col-5'>";
$lineStart = "<li class='list-group-item bg-dark text-white'><div class='row'>";
$lineEnd = "</div>" . "</div></li>";

$sql = "SELECT * FROM disciplines where isrunning=0";

$result= mysqli_query($link, $sql);
ShowHead();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $isEntry = CheckForEntry($playerId, $row['id'], $link);
        $cur = 'Player: ' . GetCurrentEntries($row['id'], $link);
        $min = ' / (min) ' . $row['min'];
        $startDate = $row['startdate'];
        $avgMin = "Avg. Duration: " . $row['avgminute'] . " min";
        $middle = "<div class='col-5'>" . $row["name"] . $divider . $startDate;
        
        if($isEntry == 0 && $row['isrunning'] == 0){
            $editBt = '</div><div class="col-2 align-self-end"><a id="' . $row["id"]  . 'P" class="btn btn-success float-right" onClick="AddDis(' . $row["id"]  . ')"  data-toggle="tooltip" data-placement="left" title="' . $avgMin . '" >Join</a>';
            $toEcho = $lineStart . $middle . $editBt . $lineEnd;
        }else{
            $toEcho = $lineStart . $middle . $lineEnd;
        }
        
        echo $toEcho;
        
    }
} else {
    echo "THERE MIGHT BE NONE" . mysqli_error($link);
}

mysqli_close($link);

function CheckForEntry($playerId, $disId, $link){
    $entry = 0;

    $sql = "SELECT * FROM applylist where playerid = '" . $playerId . "' AND disid = " . $disId;

    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        $entry = 1;
    }
    
    return $entry;
}

function GetCurrentEntries($id, $link){
    $entry = 0;

    $sql = "SELECT * FROM applylist where disid = " . $id;

    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $entry += 1;
        }
    }
    
    return $entry;
}

function ShowHead(){
    echo '<li class="list-group-item bg-dark text-white">
                <div class="row">
                    <div class="col-5">
                        <p class="font-weight-bold">Name</p>
                    </div>
                    <div class="col-5">
                        <p class="font-weight-bold">Start Date</p>
                    </div>
                    <div class="col-2 align-self-end">
                        <p class="font-weight-bold text-right">Join?</p>
                    </div>
                </div>
            </li>';
}
?>

