<?php
    include ('data.php');
    
    $newsStart = '   <div class="row">
                        <div class="jumbotron bg-dark" style="width: 100%; padding: 10px 10px 30px 10px; margin: 0 0 5px 0;">
                            <div class="container" style="padding: 0 0 0 0">';
    $newsEnd = '</div></div></div>';
                                
                                
                            

    $sql = "SELECT * FROM news";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $header = '<h1 class="h3 text-white">' . $row['header'] . '</h1>';
            $info = '<p class="lead text-light text-truncate">' . $row['info'] . '</p>';
            echo $newsStart . $header . $info . $newsEnd;
        }
    } else {
        echo "0 results";
    }
    

?>
