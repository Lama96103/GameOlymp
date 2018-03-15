<?php
include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";
$start = '<div class="row" style="padding: 1px 10px 1px 10px"><div class="btn-group btn-group-toggle" data-toggle="buttons" style="width: 100%;">';
$end = '</div></div>';
$num = 0;
$count = 0;
echo $start;
$sql = "SELECT id, name FROM disciplines where isrunning = 1";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $count ++;
          if($count < mysqli_num_rows($result)){
              $bt = ' <label class=" col btn btn-secondary d-inline-block text-truncate" id="' . $row['id'] . 'L" onclick="RadioClick(' . $row['id'] . ');" style="width: 50%;">
                        <input type="radio" name="options" id="' . $row['id'] . '" autocomplete="off"> ' . $row['name'] . '
                    </label>';
          }else{
            $bt = ' <label class=" col btn btn-secondary d-inline-block text-truncate" id="' . $row['id'] . 'L" onclick="RadioClick(' . $row['id'] . ');" style="width: 100%;">
                      <input type="radio" name="options" id="' . $row['id'] . '" autocomplete="off"> ' . $row['name'] . '
                  </label>';
          }
          if($num < 2){
              echo $bt;
              $num++;
          }else{
              echo $end . $start. $bt;
              $num = 1;
          }
        }
    } else {
        echo "<p>There seems to be no Tournament running</p>";
    }

?>
