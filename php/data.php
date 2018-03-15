<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website";

    $email = 'larswunderlich12@gmail.com';
    $impressum= 'This website is in an early stage of developement. We are always happy about improvement suggestions, feedback and new ideas.
     Contact us at <a href="mailto:' . $email . '?Subject=GameOlymp" target="_top">' . $email . '</a>';

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Name einer Discipline
    function GetDisName($id, $link){
        $sql = "SELECT name FROM disciplines where id = " . $id;

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
    // Name eines Spielers
    function GetPlayerName($id, $link){

        $sql = "SELECT name FROM player where id =" . $id;

        $result = mysqli_query($link, $sql);

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
    function GenerateNews($link, $header, $info, $key){
        if($key == -1){
            $sql = "INSERT INTO news (`header`, `info`) VALUES ('". $header ."', '". $info ."')";
        }else{
            $sql = "INSERT INTO news (`header`, `info`, `key`) VALUES ('". $header ."', '". $info ."', '".$key."')";
        }

        $result = mysqli_query($link, $sql);

        if(!$result){
            die("Could not Insert to news");
        }
    }



?>
