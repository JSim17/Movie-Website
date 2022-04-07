<?php
    include_once '../config/config.php';
    
    $page_title = "Upcoming Movies";
    include_once '../templates/header.php';

    include_once '../includes/upcoming-inc.php';
    $min = date('d/m/Y', strtotime($upcoming->dates->minimum));
    $max = date('d/m/Y', strtotime($upcoming->dates->maximum));
    echo "<h6 class='text-center'>From<b> ".$min."</b>, and <b>" .$max. "</b></h6>"
?>
<ul>
    <?php
        echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">';
        foreach($upcoming->results as $p){
            echo '<div class="col">
                <div class="card h-100 shadow rounded">
                <img src="http://image.tmdb.org/t/p/w500'. $p->backdrop_path . '" class="card-img-top" alt="'.$p->original_title.'">
                <div class="card-body">
                    <h5 class="card-title">'. $p->title .' ('. substr($p->release_date, 0, 4) . ')'.'</h5>
                    <p class="card-text text-break" style="color: black">'.$p->overview.'</p>
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

<?php 
    include_once '../templates/footer.php';
?>