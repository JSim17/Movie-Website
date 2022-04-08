<?php
    $page_title = "Add Movie";
    include_once '../templates/header.php';

 if(isset($_SESSION['loggedin'])){

?>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "none") {
            echo "</br><h6 class='alert alert-success text-center' role='alert'>New movie was added successfully!</h6>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "</br><h6 class='text-center'>Something went wrong when adding, try again!</h6>";
        }
    }
?>

<div class="card">
    <div class="card-header">
        <p>Input the details of the movie you wish to add</p>
    </div>
    <div class="card-body">
        <form action="..\includes\movieAdd-inc.php" method="post">
            <div class="row mb-3">
                <label for="movie_title" class="col-sm-2 col-form-label">Movie Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="movie_title" name="movie_title" placeholder="Movie Title" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="movie_year" class="col-sm-2 col-form-label">Release Year</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="movie_year" name="movie_year" placeholder="Year of Release" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="movie_overview" class="col-sm-2 col-form-label">Overview</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="movie_overview" rows="3" name="movie_overview" placeholder="Movie Overview" maxlength="255" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="movie_img" class="col-sm-2 col-form-label">Poster</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="movie_img" name="movie_img" placeholder="TMDB Image URL" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="movie_cast" class="col-sm-2 col-form-label">Cast</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="movie_cast" name="movie_cast" placeholder="Movie Cast - Seperated with ','" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="movie_trailer" class="col-sm-2 col-form-label">Trailer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="movie_trailer" name="movie_trailer" placeholder="Youtube key for trailer" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>


<?php }else{ ?>
    
<div class="alert alert-danger" role="alert">
    PLease <a class="alert-link" data-bs-toggle='modal' data-bs-target='#loginModal' href=''>login</a> to add movies to the website!
</div>

<?php 
}
    include_once '../templates/footer.php';
?>