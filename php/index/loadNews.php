<?php
    echo '<div id="accordion">';

    $show = 'true';
    $coll = '';
    $show = 'show';

    $sql = "SELECT * FROM news ORDER By id DESC LIMIT 7";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $header = '<div class="card"><div class="card-header bg-dark" id="'. $row['id'] . 'HEAD">
                          <h5 class="mb-5" style ="margin-bottom: 0.2rem !important;">
                                <div class="row justify-content-between">
                                    <div class="coll ">
                                        <button class="btn btn-link ' . $coll . '  text-light" data-toggle="collapse" data-target="#'. $row['id'] .'COLL" aria-expanded="'. $show .'" aria-controls="'. $row['id'] .'COLL">' . $row['header'] . '
                                        </button>
                                    </div>
                                    <div class="coll ">
                                        <p class="text text-secondary">'.$row['key'].'</p>
                                    </div>
                                </div>

                          </h5>
                        </div>';

            $info = '<div id="'. $row['id'] .'COLL" class="collapse '.$show.'" aria-labelledby="'. $row['id'] . 'HEAD" data-parent="#accordion"><div class="card-body">' . $row['info'] . '</div></div></div>';

            echo $header . $info;
            $show = 'false';
            $coll = 'collapsed';
            $show = '';
        }
    } else {
        echo "0 results";
    }

    echo '</div>';


?>
