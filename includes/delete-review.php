<?php 
    include_once '../db/dbConfig.php';
    
    $review_id = $_GET['id'];
    $sql = "DELETE FROM reviews WHERE review_id = $review_id";

    if($conn->query($sql)) {
        header("Location: ../pages/my-reviews.php?success=review_deleted");
    } else {
        header("Location: ../pages/popular.php?error=stmtfailed");
    }

    $conn->close();
?>