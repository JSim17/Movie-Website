<?php
    $page_title = "Create Account";
    include_once '../templates/header.php';

?>

<form action="../includes/register-inc.php" method="post">
    <div class="card">
        <div class="card-header">
            Enter personal details
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" required>
                <div id="usernameHelp" class="form-text">This will be displayed on site</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>

<?php 
    // Error message handling 
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "usernametaken"){
            echo "<p>That username or email is already taken, please choose another!</p>";
        }
        else if ($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong, try again!</p>";
        }
        else if ($_GET["error"] == "datapost"){
            echo "<p>Something went wrong, try again!</p>";
        }
        else if ($_GET["error"] == "none"){
            echo "<p>You have Signed up! You can now log in.</p>";
        }
    }


    include_once '../templates/footer.php';
?>