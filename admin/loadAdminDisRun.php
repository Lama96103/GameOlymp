<?php
$playerID = $_COOKIE['userID'];

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";



$sql = "SELECT * FROM disciplines where isrunning=1";

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $isEntry = CheckForEntry($playerID, $row['id'], $link);
        $min = ' / Min: ' . $row['min'];
        $cur = ' ------- Current: ' . GetCurrentEntries($row['id'], $link);
        if($isEntry == 0){
            $min = ' Min: ' . $row['min'];
            echo "<option value='" .  $row['id'] . "'>" . $row["name"] . $cur . $min . "</li>";
        }else{
            echo "<option value='" .  $row['id'] . "'>" . $row["name"] . $cur . $min .  "</li>";
        }

    }
} else {
    echo "THERE MIGHT BE NONE" . mysqli_error($link);
}

mysqli_close($link);

function CheckForEntry($playID, $id, $link){
    $entry = 0;

    $sql = "SELECT * FROM applylist where playerid = '" . $playID . "' AND disid = " . $id;

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


?>
