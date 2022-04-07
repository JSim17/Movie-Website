<?php
    include '../db/dbConfig.php';
    $page_title = "Profile";
    include_once '../templates/header.php';

    if (!isset($_SESSION['loggedin'])) {
        header('Location: ../pages/index.php');
        exit;
    }
    
    // We don't have the password or email info stored in sessions so instead we can get the results from the database.
    $stmt = $conn->prepare('SELECT password, email FROM accounts WHERE id = ?');
    // In this case we can use the account ID to get the account info
    $stmt ->bind_param('i', $_SESSION['id']);
    $stmt ->execute();
    $stmt->bind_result($password, $email);
    $stmt ->fetch();
    $stmt ->close();
?>

<div class="card">
    <div class="card-header">
        <p>Your account details are below:</p>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td>Username:</td>
                <td><?=$_SESSION['name']?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td type="password"><?=$password?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$email?></td>
            </tr>
        </table>
    </div>
</div>

<?php 
    include_once '../templates/footer.php';
?>