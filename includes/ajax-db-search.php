<?php 
    include_once '../db/dbConfig.php';
    if(isset($_POST['term'])) {
        $sql = "SELECT * FROM movies WHERE movie_title LIKE '{%_GET['term']}%' LIMIT 25";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($movie = mysqli_fetch_array($result)) {
                $res[] = $movie['movie_title'];
            }
        } else {
            $res = array();
        }
        echo json_encode($res);
    }
?>