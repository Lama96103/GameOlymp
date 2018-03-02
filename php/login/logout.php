<?php

setcookie("validUser","", -1, "/");
setcookie("userName","", -1, "/");
setcookie("userPass","", -1, "/");
setcookie("userID","", -1, "/");

header ('Location: http://' . $_SERVER['HTTP_HOST'] . '/site/login/login.php'); 


?>