<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website";   

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }



    // Name einer Discipline
    function GetDisName($id, $linkGET){
        $sql = "SELECT * FROM disciplines where id = " . $id;

        $result= mysqli_query($linkGET, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['name'];
            }
        }else{
            return -1;
        }
    }
    // Name eines Spielers
    function GetPlayerName($id, $link){

        $sql = "SELECT * FROM player where id = " . $id;

        $result= mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['name'];
            }
        }else{
            return -1;
        }
    }



?>