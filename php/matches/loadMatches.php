<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$id = $_GET['id'];
$lastRound = -1;

$sql = "SELECT * FROM matches where disid = " . $id;
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if($lastRound  != $row['round']){
                if($lastRound != -1){
                    DisplayDivEnd();
                }
                DisplayDivStart($row['round'] + 1);
                $lastRound = $row['round'];
            }
            $hostName = GetPlayerName($row['hostid'], $link);
            $guestName = GetPlayerName($row['guestid'], $link);
            if($guestName == -1){
                $guestName = 'Freilos';
            }
            $cHost = GetColor($row['pointshost'], $row['pointsguest'], $row['guestid'], $row['confirmed'], $row['played']);
            $cGuest = GetColor($row['pointsguest'], $row['pointshost'], 0, $row['confirmed'], $row['played']);
            
            $start = '  <li class="list-group-item  bg-secondary text-white">
                        <ul class="list-group"> 
                            <li class="list-group-item ' . $cHost . '">
                                <div class="row">';
            $middle = '</div></li><li class="list-group-item ' . $cGuest . '"><div class="row">';
            $end = '</div></li></ul></li>';
            
            $host = '   <div class="col col-md-3">' . $hostName . '</div>
                        <div class="col col-md-3">' . $row['pointshost'] . '</div>';
            $guest = '  <div class="col col-md-3">' . $guestName . '</div>
                        <div class="col col-md-3">' . $row['pointsguest'] . '</div>';
            
            echo $start . $host . $middle . $guest . $end;                     
        }
    } else {
        echo '<p>There seems to be a black hole</p>';
    }

    DisplayDivEnd();

function GetColor($pHome, $pGuest, $guest, $confirmed, $played){
    if($played == 1 && $confirmed == 1){
        if($guest < 0){
            return 'bg-success'; 
        }
        if($pHome > $pGuest){
            return 'bg-success';
        }else if($pHome < $pGuest){
            return 'bg-danger';
        }else{
            return 'bg-dark'; 
        }
    }else if($played == 1 > 0 && $confirmed == 0){
        return 'bg-warning';
    }else{
        return 'bg-dark'; 
    }
    
}


function DisplayDivStart($round){
    if($round == 1){
        echo '  <div class="container" style="padding: 0 0 0 0">  
                <h1 class="h3">Round ' . $round . '</h1>
                <ul class="list-group">';   
    }else{
        echo '  <div class="container" style="padding: 20px 0 0 0;">  
                <h1 class="h3">Round ' . $round . '</h1>
                <ul class="list-group">';   
    }
}

function DisplayDivEnd(){
    echo '</ul></div>'; 
}

?>