<?php
include ('../data.php');

$name = $_POST['name'];
$pass = $_POST['pass'];
$usersPass = '';
$isUser = 0;

$sql = "SELECT name, password FROM player";

$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if(strcmp($row["name"], $name) == 0){
            $usersPass = $row["password"];
            $isUser = 1;
            echo 'User is: '. $name . " Pass ist: " . $usersPass .  ' und ' . $isUser ;
            break;
        }
    }
}
$id = GetID($link, $name);

mysqli_close($link);

if (password_verify($pass, $usersPass) && $isUser == 1 && $id != -1) {
    echo 'Password is valid!';
    setcookie("validUser","true", time()+60*60*24*10, "/");
    setcookie("userName", $name, time()+60*60*24*10, "/");
    setcookie("userID", $id, time()+60*60*24*10, "/");
    setcookie("userPass", $usersPass, time()+60*60*24*10, "/");
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
} else {
    echo 'Invalid password.';
    setcookie("validUser","false", time()+60*60*24*10, "/");
    setcookie("userName","", time()+60*60*24*10, "/");
    setcookie("userID", "", time()+60*60*24*10, "/");
    setcookie("userPass", "", time()+60*60*24*10, "/");
    if(!password_verify($pass, $usersPass)){
        header ('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/login.php?error=Invalid Password or User');  
    }else if($isUser == 0){
        header ('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/login.php?error=User not known');  
    }else{
        header ('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/login.php?error=Error, Please contact admin');  
    }
}

function GetID($link, $name){
    $sql = "SELECT * FROM player where name = '" . $name . "'";

    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            return $row['id'];
        }
    }else{
        return -1;
    }
}



?>