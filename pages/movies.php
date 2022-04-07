<?php
    include_once '../db/dbConfig.php';

    $page_title = mysqli_real_escape_string($conn, $_GET['title']);
    $movie_id = mysqli_real_escape_string($conn, $_GET['id']);
    include_once '../templates/header.php';

    $sql = "SELECT * FROM movies WHERE movie_title='$page_title'";
    $review_sql = "SELECT review_rating, review_comment FROM reviews WHERE review_movie_id='$movie_id'";

    $result = $conn->query($sql);
    $review_result = $conn->query($review_sql);

    if(!$result || !$review_result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Selection failed with: ($errno) $erromsg<br/>";
        $conn->close();
        exit;
    } else {
        while($res = $result->fetch_assoc()) {
?>

<div class="container wrapper">
    <?php foreach($result as $res) { ?>
    <div class="col-xs-4">
        <img src="<?php echo $res['movie_img']; ?>" style="float:left;width:400px;margin: 0 20px 20px 15px"/>
        <h2 style="color: #4C5052">  Overview:</h2>
        <h2 class="text" style="font-weight:normal; font-size:110%">
            <?php echo $res['movie_overview'];?>
        </h2>
        <h2 style="color: #4C5052">  Starring:</h2>
        <h2 class="text" style="font-weight:normal; font-size:110%">
            <?php echo $res['movie_cast'];?>
        </h2>
        <h2 style="color: #4C5052">  Year:</h2>
        <h2 class="text" style="font-weight:normal; font-size:110%">
            <?php echo $res['movie_year'];?>
        </h2>
    </br>
        <button class="btn btn-success">Review</button>
        <button class="btn btn-outline-dark">Watchlater</button>
    </br>
    </div>
    <?php } ?>
</div>


<?php 
    }}
    $conn->close();
    include_once '../templates/footer.php';
?>