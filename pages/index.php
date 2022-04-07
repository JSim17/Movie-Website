<?php
    $page_title = "Home";
    include_once '../templates/header.php';
    // Error message handling 
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "wrongPassword"){
            echo "<h4>Incorrect password, Please try again!</h4>";
        } elseif ($_GET["error"] == "wrongUsername") {
            echo "<h4>Incorrect username, Please try again!</h4>";
        }
    }
?>

<!-- Carousel -->
<div id="homeCarousel" class="carousel slide shadow" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://image.tmdb.org/t/p/w1280/lrP1TQf3stZveNEyviUUcSh8HLA.jpg" class="d-block w-100" alt="Sonic"/>
            <div class="carousel-caption d-none d-md-block">
                <h1>Welcome to GoodFilms</h1>
                <p>The one stop destination for everything film and review related</p>
                <p>Find your next favourite or review ones you have already watched</p>
                <p>Create a list and keep ontop of your films</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://image.tmdb.org/t/p/w1280/ewUqXnwiRLhgmGhuksOdLgh49Ch.jpg" class="d-block w-100" alt="adam project"/>
            <div class="carousel-caption d-none d-md-block">
                <h1>Accounts</h1>
                <p>Log in or create an account to leave reviews on your favourite films and gain full access to the website</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://image.tmdb.org/t/p/w1280/j2zyoYrWjWyraHMdkqAkSG1MISJ.jpg" class="d-block w-100" alt="batman"/>
            <div class="carousel-caption d-none d-md-block">
                <h1>6CS028</h1>
                <p>Made for the final project for 6CS028 - Advanced Web Development</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Upcoming movies -->
<div class="mt-3">
    <h3 class="text-center"><strong>Upcoming Movies</strong></h3>
    <?php 
        include_once '../config/config.php';
        include_once '../includes/upcoming-inc.php';
    ?>
    <ul>
    <?php
        echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">';
        foreach($upcoming->results as $p){
            echo '<div class="col">
                <div class="card h-100 shadow rounded" style:"width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">'. $p->title .' ('. substr($p->release_date, 0, 4) . ')'.'</h5>
                    <img src="http://image.tmdb.org/t/p/w500'. $p->poster_path . '" class="card-img-top" alt="'.$p->original_title.'">
                </div>
                <div class="card-footer">
                    <span class="badge bg-primary">'.$p->vote_average.'</span>
                    <small class="text-muted">Release date: '.date("d/m/Y", strtotime($p->release_date)).'</b></small>
                </div>
                </div>
            </div>';
        }
        echo '</div>'
    ?>
</ul>
</div>

<?php 
    include_once '../templates/footer.php';
?>