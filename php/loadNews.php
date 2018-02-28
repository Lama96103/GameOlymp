<?php
    include ('data.php');
    
    $newsStart = '   <div class="row">
                        <div class="jumbotron" style="width: 100%">
                            <div class="container" style="padding: 0 0 0 0">';
    $newsEnd = '</div></div></div>';
                                
                                
                            

    $sql = "SELECT * FROM news";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $header = '<h1 class="display-5">' . $row['header'] . '</h1>';
            $info = '<p>' . $row['info'] . '</p>';
            echo $newsStart . $header . $info . $newsEnd;
        }
    } else {
        echo "0 results";
    }
    

?>
