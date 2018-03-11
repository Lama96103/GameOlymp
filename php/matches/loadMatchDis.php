<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";

$sql = "SELECT id, name FROM disciplines";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '  <label class="btn btn-secondary" id="' . $row['id'] . 'L" onclick="RadioClick(' . $row['id'] . ');">
                        <input type="radio" name="options" id="' . $row['id'] . '" autocomplete="off"> ' . $row['name'] . '
                    </label> ';    
        }
    } else {
        echo "0 results";
    }

?>