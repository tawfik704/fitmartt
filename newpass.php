<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }


    // Prepare and execute SQL statement
    $sql = "SELECT * FROM users WHERE reset_token='$token' AND token_expiry > NOW()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE users SET password='$password', reset_token=NULL, token_expiry=NULL WHERE reset_token='$token'";
        if (mysqli_query($conn, $sql)) {
            echo "Your password has been reset successfully.";
            header("Location: login.html?reset=success");

        } else {
            echo "Failed to reset password.";
        }
    } else {
        echo "Invalid or expired token.";
    }
}

mysqli_close($conn);
?>
