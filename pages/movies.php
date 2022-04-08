<?php
    include_once '../db/dbConfig.php';

    $page_title = mysqli_real_escape_string($conn, $_GET['title']);
    $movie_id = mysqli_real_escape_string($conn, $_GET['id']);
    $mid = $_GET['id'];
    include_once '../templates/header.php';

    $sql = "SELECT * FROM movies WHERE movie_title='$page_title'";
    $review_sql = "SELECT review_rating, review_comment FROM reviews WHERE review_movie_id='$movie_id'";

    $result = $conn->query($sql);
    $review_result = $conn->query($review_sql);
    $review_return = $review_result->num_rows;

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
        <img class="shadow rounded" src="<?php echo $res['movie_img']; ?>" style="float:left;width:400px;margin: 0 20px 20px 15px"/>
        <h3 style="color: #4C5052">  Overview:</h3>
        <h2 class="text" style="font-weight:normal; font-size:110%">
            <?php echo $res['movie_overview'];?>
        </h2>
        <h3 style="color: #4C5052">  Starring:</h3>
        <h2 class="text" style="font-weight:normal; font-size:110%">
            <?php echo $res['movie_cast'];?>
        </h2>
        <h3 style="color: #4C5052">  Year:</h3>
        <h2 class="text" style="font-weight:normal; font-size:110%">
            <?php echo $res['movie_year'];?>
        </h2>
    </br>
    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#trailerModal">Trailer</button>
    <?php if(isset($_SESSION['loggedin'])){?>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ratingModal">Review</button>
        <?php } else {
        echo "<p>PLease <a class='alert-link' data-bs-toggle='modal' data-bs-target='#loginModal' href=''>login</a> to review!</p>";
        }?>
    </br>
    </br>
    <?php 
        while($review_res = $review_result->fetch_assoc()) {
            if($review_return > 0 ){
            echo '<h3 style="color:#4C5052"> Reviews:</h3>';
                foreach($review_result as $review_res) {
            ?>
                <h2 class="text" style="font-weight:normal; font-size:110%">
                <?php echo "<strong>" . $review_res['review_rating'] . " stars - </strong><em>" . $review_res['review_comment'] . "</em>"?>
                <hr/>
                </h2>
            <?php }}else{
                echo "<h3 style='color:#4C5052'> There doesn't seem to be any reviews for this movie! Why not add one.</h3>";
            } }?>
    </div>
    
    <div class="modal fade" id="trailerModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body border-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="movieTrailer" class="embed-responsive-item" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $res['movie_trailer'];?>" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php } ?>
</div>


<!-- Modal -->
<div class="modal fade" id="ratingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ratingModalLabel">Review <?php echo $_GET['title']?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
            <form id="ratingForm" action="../includes/add-rating.php?id=<?php echo $mid?>" method="post">
                <input type="hidden" name="movie_id" value="<?php echo $mid ?>"/>
                <div class="mb-3">
                    <label for="addRating" class="form-label">Add Rating</label>
                    <select class="form-select" name="review_rating" id="addRating" required>
                        <option selected>Open to select rating</option>
                        <option name="star" id="star1" value="1">&#9733;</option>
                        <option name="star" id="star2" value="2">&#9733; &#9733;</option>
                        <option name="star" id="star3" value="3">&#9733; &#9733; &#9733;</option>
                        <option name="star" id="star4" value="4">&#9733; &#9733; &#9733; &#9733;</option>
                        <option name="star" id="star5" value="5">&#9733; &#9733; &#9733; &#9733; &#9733;</option>
                    </select>      
                </div>
                <div class="mb-3">
                <textarea class="form-control" rows="3" name="rating_comment" maxlength="255"placeholder="Add your comment here..." required></textarea>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
            </form>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-dialog iframe{
        margin: 0 auto;
        display: block;
    }
</style>



<?php 

    }}
    $conn->close();
    include_once '../templates/footer.php';
?>