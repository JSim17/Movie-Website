<?php
session_start();
include '../db/dbConfig.php';

if(isset($_POST['current_password']) && isset($_POST['new_password']) 
    && isset($_POST['confirm_password'])) {
        
        $old_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if(empty($old_password)) {
            header("Location: ../pages/profile-edit.php?error=no_old_pwd");
        } else if(empty($new_password)) {
            header("Location: ../pages/profile-edit.php?error=no_new_pwd");
        } else if(empty($confirm_password)) {
            header("Location: ../pages/profile-edit.php?error=no_confirm_pwd");
        } else if($new_password !== $confirm_password) {
            header("Location: ../pages/profile-edit.php?error=no_match");
        } else {
            // hashing the passwords
            $old_password = password_hash($old_password, PASSWORD_DEFAULT);
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $id = $_SESSION['id'];

            $sql = "SELECT username, password WHERE id = '$id' AND password = '$old_password'";
            $result = mysqli_query($conn, $sql);
            if($stmt->num_rows() === 1){
                $sql_2 = "UPDATE accounts SET password = '$new_password' WHERE id = '$id'";
                mysqli_query($conn, $sql_2);
                header("Location: ../pages/profile-edit.php?success=pwd_changed");
                exit();
            } else {
                header("Location: ../pages/profile-edit.php?error=stmtfailed");
                exit();
            }
        }
} else {
    header("Location: ../pages/profile-edit.php");
    exit();
}
?>