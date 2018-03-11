<?php

    if (isset($_COOKIE["validUser"]) && isset($_COOKIE['userName']) && isset($_COOKIE['userPass'])){
        $validUser = $_COOKIE['validUser'];
        $name = $_COOKIE['userName'];
        $pass = $_COOKIE['userPass'];
    }else{
        OnNotValid();
    }

    $usersPass = '';
    $isUser = 0;

    include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

    $sql = "SELECT * FROM player";

    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if(strcmp($row["name"], $name) == 0 && $row['admin'] == 1){
                $usersPass = $row["password"];
                $isUser = 1;
                $validUser = true;
                 break;
            }else{
                $isUser = 0;
                $validUser = false;
            }
        }
    }

    mysqli_close($link);
    if (strcmp($pass, $usersPass) !== 0 && $isUser == 0 && $validUser == false) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
        exit;
    }

    function OnNotValid(){
        setcookie("validUser", "", -1, "/");
        setcookie("userName","", -1, "/");
        setcookie("userPass", "", -1, "/");
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/html/login.html');
        exit;
    }
?>
