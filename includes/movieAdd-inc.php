<?php
include '../db/dbConfig.php';

if(isset($_POST['submit'])) {
    $title = $_POST['movie_title'];
    $year = $_POST['movie_year'];
    $overview = $_POST['movie_overview'];
    $img = $_POST['movie_img'];
    $cast = $_POST['movie_cast'];
    $trailer = $_POST['movie_trailer'];

    $sql = "INSERT INTO movies (movie_title, movie_year, movie_overview, movie_img, movie_cast, movie_trailer) VALUES (?,?,?,?,?,?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../pages/movie-add.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss", $title, $year, $overview, $img, $cast, $trailer);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../pages/movie-add.php?error=none");
    exit();
}
?>