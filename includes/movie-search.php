<?php
    $page_title = "Movie Results";
    include_once '../templates/header.php';

    include '../db/dbConfig.php';

    if(isset($_POST['submit-search'])) {
        // Prevent sql injection
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM movies WHERE movie_title LIKE '%$search%' OR movie_overview LIKE '%$search%' OR movie_year LIKE '%$search%' OR movie_cast LIKE '%$search%'";
        
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        $searchValue = $_POST['search'];

        if($queryResult > 0) {
            echo '<h5>You searched for ' .$searchValue. '...</h5></br>';
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">';
            while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="col">
        <div class="card h-100 shadow rounded">
            <a href="../pages/movies.php?id=<?php echo $row['movie_id']?>&title=<?php echo $row['movie_title']?>">
                <img src="<?php echo $row['movie_img']; ?>" class="card-img-top width: 100%;" />
            </a>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['movie_title'] ?></h5>
            </div>
            <div class="card-footer">
                <small class="text-muted">Released in <?php echo $row['movie_year'] ?></small>
            </div>
        </div>
    </div>
<?php
            }
            echo '</div>';
        } else {
            echo "<div class='alert alert-primary' role='alert'>
                    That doesn't seem to be here! Why not add it to the website <a href='../pages/movie-add.php' class='alert-link'>here</a>
                </div>";
        }
    }
    
    include_once '../templates/footer.php';
?>