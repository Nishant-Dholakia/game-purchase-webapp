<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup Page</title>
<link rel="stylesheet" href="./login_signupstyle.css">
</head>
<body>

<form id="signup-form" action="#" method="post">
    <h2 class="header">Sign Up</h2>
    <label for="signup-name">Name:</label>
    <input type="text" id="signup-name" name="signup-name" required autofocus><br>
    <label for="signup-mobile">Mobile Number:</label>
    <input type="text" id="signup-mobile" name="signup-mobile" required><br>
    <label for="signup-email">Email:</label>
    <input type="email" id="signup-email" name="signup-email" required><br>
    <label for="birth-date">Date of Birth:</label>
    <input type="date" id="birth-date" name="birth-date" required><br><br>
    <label for="signup-password">Password:</label>
    <input type="password" id="signup-password" name="signup-password" required><br>
    <label for="confirm-password">Confirm Password:</label>
    <input type="password" id="confirm-password" name="confirm-password" required><br>
    <label for="address">Permanent address :</label><br>
    <textarea name="address" id="address" cols="50" rows="10" placeholder="Enter your permanent address" required></textarea><br>
    <button type="submit" name="submit">Sign Up</button>
</form>
<p>Already have an account? <a href="login.php">Login here</a>.</p>

</body>
</html>

<?php

    require('connection.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['signup-name'];
            $mobile = $_POST['signup-mobile'];
            $email = $_POST['signup-email'];
            $birth_date = $_POST['birth-date'];
            $password = $_POST['signup-password'];
            $cpassword = $_POST['confirm-password'];
            $address = $_POST['address'];

            // $countdigit = 0;
            // $tmobile = $mobile;
            // while($tmobile)
            // {
            //     echo "$tmobile<br>";
            //     $tmobile /= 10;
            //     $countdigit++;
            // }
            if(strlen($mobile) != 10)
            {
                echo "<script type='text/javascript'>alert('Mobile number must be of 10 digit...');</script>";
                echo "<script type='text/javascript'>window.location.href = 'signup.php';</script>";
            }
            else
            {
                            $temail = "SELECT * FROM `user_details` WHERE `emailid` = '$email'";
                            $teresult = mysqli_query($conn, $temail);
                            $terow = mysqli_num_rows($teresult);
                
                            $tuname = "SELECT * FROM `user_details` WHERE `username` = '$name'";
                            $tnresult = mysqli_query($conn, $tuname);
                            $tnrow = mysqli_num_rows($tnresult);
                
                            $tmobile = "SELECT * FROM `user_details` WHERE `mobilenumber` = '$mobile'";
                            $tmresult = mysqli_query($conn, $tmobile);
                            $tmrow = mysqli_num_rows($tmresult);
                            echo "name row ".$tnrow." mobile row ".$tmrow."<br>";
                            if($terow > 0)
                            {
                                echo "<script type='text/javascript'>alert('email id already exists, please try a new email-id...');</script>";
                                echo "<script type='text/javascript'>window.location.href = 'signup.php';</script>";
                            }
                            elseif($tnrow > 0)
                            {
                                echo "<script type='text/javascript'>alert('user name already exists, please try a new user name...');</script>";
                                echo "<script type='text/javascript'>window.location.href = 'signup.php';</script>";
                            }
                            elseif($tmrow > 0)
                            {
                                echo "<script type='text/javascript'>alert('Mobile Number already exists, please try a new mobile number...');</script>";
                                echo "<script type='text/javascript'>window.location.href = 'signup.php';</script>";
                            }
                            elseif($password != $cpassword)
                            {
                                echo "<script type='text/javascript'>alert('Passwords does not match . Enter valid password...');</script>";
                                echo "<script type='text/javascript'>window.location.href = 'signup.php';</script>";
                            }
                            else
                            {
                                $sql = "INSERT INTO user_details(username, mobilenumber, emailid, birthdate, password, address) VALUES('$name', '$mobile', '$email', '$birth_date', '$password', '$address')";
                                $result = mysqli_query($conn, $sql);
                                if($result)
                                {
                                    echo "<script type='text/javascript'>alert('Registered Successfully');</script>";
                                    echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
                                }
                                else
                                {
                                    echo "<script type='text/javascript'>alert('Registration Failed');</script>";
                                    echo "<script type='text/javascript'>window.location.href = 'signup.php';</script>";
                                }
                            }
            }
        }


    }
?>