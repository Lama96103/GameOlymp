<?php

include $_SERVER['DOCUMENT_ROOT']. "/php/data.php";
$name = $_COOKIE['userID'];

$sql = "SELECT * FROM matches where disid = 1";
$round0;
$result= mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row['round'] == 0){
            
        }
        
    }
} else {
    echo "0 results or Error" . mysqli_error($link);
}


$tree = '<div class="tree">
        <ul>
          <li>
            <a href="#">Winner</a>
            <ul>
              <li>
                <a href="#">Lars</a>
                <ul>
                  <li>
                    <a href="#">Lars</a>
                    <ul>
                      <li>
                        <a href="#">Freilos</a>
                      </li>
                        <li>
                        <a href="#">Lars</a>
                      </li>
                    </ul>
                  </li>
                    <li>
                    <a href="#">Leon</a>
                        <ul>
                      <li>
                        <a href="#">Marc</a>
                      </li>
                        <li>
                        <a href="#">Leon</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li><li>
                <a href="#">Tom</a>
                <ul>
                  <li>
                    <a href="#">Tom</a>
                    <ul>
                      <li>
                        <a href="#">Tom</a>
                      </li>
                        <li>
                        <a href="#">Freilos</a>
                      </li>
                    </ul>
                  </li>
                    <li>
                    <a href="#">Max</a>
                        <ul>
                      <li>
                        <a href="#">Max</a>
                      </li>
                        <li>
                        <a href="#">Freilos</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
    </div>';
echo $tree;

?>