<?php
    $page_title = "Edit Profile";
    include_once '../templates/header.php';
?>

<h5>Password Management</h5>
<hr />

<form method="post" action="../includes/change-password.php" enctype="">
    <div class="mb-3">
        <label for="currentPassword" class="form-label">Current Password</label>
        <input type="password" name="current_password" class="form-control" id="currentPassword">
    </div>

    <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control" id="newPassword">
    </div>

    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="confirmPassword">
    </div>
    
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit">Change</button>
    </div>
</form>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "no_old_pwd") {
            echo "</br><h6 class='text-center'>Your Current password is needed!</h6>";
        }
        else if ($_GET["error"] == "no_new_pwd") {
            echo "</br><h6 class='text-center'>Your new password is needed!</h6>";
        } else if ($_GET["error"] == "no_confirm_pwd") {
            echo "</br><h6 class='text-center'>You need to confirm your new password!</h6>";
        } else if ($_GET["error"] == "no_match") {
            echo "</br><h6 class='text-center'>The confirmation and new passwords do not match!</h6>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "</br><h6 class='text-center'>Something went wrong! Try again</h6>";
        }
    }
?>

<?php 
    include_once '../templates/footer.php';
?>