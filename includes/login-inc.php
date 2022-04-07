<?php
    include '../db/dbConfig.php';

    session_start();

    // Check if the data from the login was submitted
    if(!isset($_POST['username'], $_POST['password'])) {
        // Could not get the data that should of been sent
        exit('Please fill both the username and password fields!');
    }

    if($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database
        $stmt->store_result();
        
        // Check if query has returned any results - if no username - no results
        if($stmt->num_rows > 0) {
            // If username exists, bind results to both the $id and $password variables
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exisits, now we verify the password
            // The password_hash in registration file to store the hashed passwords
            if(password_verify($_POST['password'], $password)) {
                // Verification success! User has logged in 
                // Create sessions, so we know the user is logged in, they act like cookies but remember the data on the server
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;

                header('Location: ../pages/profile.php');
            } else {
                // Incorrect password
                header("location: ../pages/index.php?error=wrongPassword");
            }
        } else {
            // Incorrect username
            header("location: ../pages/index.php?error=wrongUsername");
        }

        $stmt->close();
    }
?>