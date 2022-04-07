<?php
    include '../db/dbConfig.php';

    // basic validation to ensure the user has entered their details 
    // check if the data was submitted, isset() function will check if the data exists
    if(!isset($_POST['username'], $_POST['password'], $_POST['email'])){
        // could not get the data 
       header("location: ../pages/register.php?error=datapost");
       exit();
    }

    // need to check if the account with that username exists
    if($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE username = ? OR email = ?')) {
        $stmt->bind_param('ss', $_POST['username'], $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        // store the result to check if the account exists in the database
        if($stmt->num_rows > 0) {
            // username already exists
            header("location: ../pages/register.php?error=usernametaken");
            exit();
        }
        else {
            if($stmt = $conn->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
                // hash the password so it is not exposed in database
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                header("location: ../pages/register.php?error=none");
            }
            else{
                header("location: ../pages/register.php?error=stmtfailed");
                exit();
            }
        }
        $stmt->close();
    } 
    else {
        // something went wrong with the sql statement
        header("location: ../pages/register.php?error=stmtfailed");
        exit();
    }
    $conn->close();
?>