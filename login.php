<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./login_signupstyle.css">
</head>

<body>

    <form id="signup-form" action="#" method="post">
        <h2 class="header">Login</h2>
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="login-email" required><br>
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="login-password" required><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a>.</p>
</body>

</html>

<?php
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $emailid = $_POST['login-email'];
        $password = $_POST['login-password'];

        if($emailid == "ndpd@gmail.com" and $password == "pro_coders")
        {
            $_SESSION['admin'] = "Admin";
            echo "<script type='text/javascript'>alert('login Successfully to admin portal...');</script>";
            echo "<script type='text/javascript'>window.location.href = 'admin.php';</script>";
        }
        $sql = "SELECT * FROM `user_details` WHERE `emailid` = '$emailid'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        // $numrows = 0;
        // while ($row = mysqli_fetch_assoc($result)) 
        // {
        if ($row['emailid'] == $emailid) 
        {
            if ($row['password'] == $password) 
            {
                $_SESSION["uname"] = $row["username"];
                echo "<script type='text/javascript'>alert('login Successfully');</script>";
                echo "<script type='text/javascript'>window.location.href = 'game.php';</script>";
            } 
            else 
            {
                echo "<script type='text/javascript'>alert('Password incorrect, please try again...');</script>";
                echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
            }
            // break;
        } 
        else 
        {
            echo "<script type='text/javascript'>alert('User does not exist, please try again...');</script>";
            echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
        }
        //     $numrows++;
        // }

        // if ($numrows == mysqli_num_rows($result)) 
        // {
        //     echo "<script type='text/javascript'>alert('User does not exist, please try again...');</script>";
        //     echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
        // }
    }
}


?>