<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) { 
            $_SESSION['username'] = $username;
            header("Location: Catig.htm");
            exit();
        } else {
            echo "<h1 style='text-align:center;'>Invalid password, please try again.</h1>";
            echo "<div style='text-align:center;'><a href='login.htm'><button>Try Again</button></a></div>";
        }
    } else {
        echo "<h1 style='text-align:center;'>User not found please sign up or try again.</h1>";
        echo "<div style='text-align:center;'><a href='signup.htm'><button>sign up</button></a></div>";
        echo "<div style='text-align:center;'><a href='login.htm'><button>Try Again</button></a></div>";

    }
}

mysqli_close($conn);
?>
