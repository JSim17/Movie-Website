<?php
    include_once '../db/dbConfig.php';

    $page_title = "Popular Movies";
    include_once '../templates/header.php';

    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);

    if(!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Selection failed with: ($errno) $erromsg<br/>";
        $conn->close();
        exit;
    } else {
        while($res = $result->fetch_assoc()) {
?>
<?php
    if(isset($_GET["success"])){
        if($_GET["success"] == "review_added") {
            echo "</br><h6 class='alert alert-success text-center' role='alert'>Review was successfully added! Thank you. </h6>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "</br><h6 class='text-center'>Something went wrong when adding, try again!</h6>";
        }
    }
?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php foreach($result as $res) { ?>
    <div class="col-xs-4">
        <div class="card h-100 d-flex flex-column justify-content-between shadow rounded">
            <div class="row no-guters">
                <div class="col-auto">
                    <a href="../pages/movies.php?id=<?php echo $res['movie_id']?>&title=<?php echo $res['movie_title']?>">
                        <img src="<?php echo $res['movie_img']; ?>" class="image-fluid rounded" width="" height="300"/>
                    </a>
                </div>
                <div class="col">
                    <div class="card-body px-1">
                        <h5 class="card-title"><?php echo $res['movie_title'] ?></h5>
                        <p class="card-text"><?php echo $res['movie_overview'] ?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted"><?php echo $res['movie_year'] ?></small>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


<?php 
    }}
    $conn->close();
    include_once '../templates/footer.php';
?>