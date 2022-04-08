<?php
    $page_title = "My Reviews";
    include_once '../templates/header.php';
    include_once '../db/dbConfig.php';

    $id = $_SESSION['id'];

    // SQL statements
    $sql = "SELECT * FROM accounts WHERE id = '$id'";
    $review_sql = "SELECT review_comment, review_id, review_rating, movie_title, movie_img FROM reviews JOIN movies ON reviews.review_movie_id = movies.movie_id WHERE reviews.review_user_id = $id";

    $result = $conn->query($sql);
    $review_result = $conn->query($review_sql);

    $result_row = $result->fetch_assoc();

    if(isset($_GET["success"])){
        if($_GET["success"] == "review_deleted") {
            echo "</br><h6 class='alert alert-danger text-center' role='alert'>Review was successfully deleted!</h6>";
        }
    }

    if(!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Selection failed with: ($errno) $erromsg<br/>";
        $conn->close();
        exit;
    } else {
        ?>
        <h6>Hey <em><?php echo $_SESSION['name']?></em>, you can find your reviews down below!</h6>
        <?php while($review_row = $review_result->fetch_assoc()) { ?>
            <div class="col-xs-4">
                <div class="card h-100 d-flex flex-column justify-content-between shadow rounded">
                    <div class="row no-guters">
                        <div class="col-auto">
                            <img src="<?php echo $review_row['movie_img']; ?>" class="image-fluid rounded" width="" height="250"/>
                        </div>
                        <div class="col">
                            <div class="card-body px-1">
                                <h4 class="card-title" style="color: #4C5052"><strong><?php echo $review_row['movie_title'] ?></strong></h4>
                                <h5>Review:</h5>
                                <p class="card-text"><?php echo $review_row['review_comment'] ?></p>
                                <p class="card-text text-muted">Rating: <?php echo $review_row['review_rating']?>&#9733;</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-danger" name="delete" href="../includes/delete-review.php?id=<?php echo $review_row['review_id']?>">Delete Review</a>
                    </div>
                </div>
        </div>
        </br>


<?php }}
?>


<?php 
    include_once '../templates/footer.php';
?>