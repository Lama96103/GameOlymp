
<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$name = $_POST['name'];
$pass = $_POST['pass'];
$key = $_POST['key'];
$unHased = $pass;

$pass = password_hash($pass, PASSWORD_DEFAULT);
$valid = CheckKey($key, $link);
$noDouble = CheckDouble($name, $link);

$eintrag = "INSERT INTO player (name, password ) VALUES ('" . $name . "', '" . $pass. "')";

if($valid && $noDouble){
    $eintragen = mysqli_query($link, $eintrag);
    if (!$eintragen) {
        die('Ungültige Anfrage: ' . mysqli_error($link));
    }else{
        DelKey($link, $key);
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/login.php?error=Successfull added Account Please Log in');
    }
}else{
    if($valid == 0){
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/signup.php?error=Key%20Invalid');
    }else{
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/signup.php?error=Name%20already in use');
    }
}

function CheckKey($key, $link){
    $valid = false;
    $id = -1;

    $sql = "SELECT * FROM loginkey";
    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if(strcmp($key, $row['keyname']) == 0){
                $valid  = true;
                $id = $row['id'];
                break;
            }
        }
    }
    
    return $valid;
}

function CheckDouble($name, $link){
    $noDouble = true;

    $sql = "SELECT name FROM player";
    $result= mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if(strcmp($name, $row['name']) == 0){
                $noDouble  = false;
                break;
            }
        }
    }
    
    return $noDouble;
}

function DelKey($link, $key){
    $sql = "DELETE FROM loginkey where keyname = '" . $key. "'";
    mysqli_query($link, $sql);
}
?>