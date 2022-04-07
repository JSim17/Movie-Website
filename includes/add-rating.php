<?php
include '../db/dbConfig.php';
session_start();

if(isset($_POST['submit'])) {
    $user = $_SESSION['id'];
    $movie = $_GET['id'];
    $rating = $_POST['review_rating'];
    $comment = $_POST['rating_comment'];

    $sql = "INSERT INTO reviews (review_movie_id, review_user_id, review_rating, review_comment) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../pages/popular.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $movie, $user, $rating, $comment);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../pages/popular.php?success=review_added");
    exit();
    }
?>