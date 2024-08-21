<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Page</title>
<link rel="stylesheet" href="styles.css" />
<link rel="stylesheet" href="navstyle.css">
<style>
    body 
    {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
    }
    form 
    {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 0 auto;
        margin-top: 10%;
    }
    h2 
    {
        margin-top: 0;
        color: #333;
        text-align: center;
    }
    label 
    {
        /* display: block; */
        /* margin-bottom: 5px; */
        color: #555;
    }
    input{
        width: calc(100% - 10px);
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }
    input[type="submit"]:hover 
    {
        background-color: #0056b3;
    }
    #upi,#card
    {
        width:10px;
    }
</style>
</head>
<?php

    

?>
<body>

<ul class="topnav">
      	<li class="company"><strong>Spectro Gaming</strong></li>
        <li class="right"><a href="#" ><strong >Profile</strong> : <?php echo $_SESSION["uname"]; ?></a></li>  
</ul>

    <?php

    if(isset($_POST["option"]))
    {
        $value = $_POST["payment-method"];
        $_SESSION['paym'] = $value;
        if($value == "card")
        {
            echo "     
            <form id='payment-form' action='bill.php' method='post'>
            <h2>Payment</h2>       
            <div id='card-details'>
            <label for='card-number'>Card Number : </label>
            <input type='number' id='card-number' name='card-number' required>
            <br>
            <label for='expiry-date'>Expiry Date : </label>
            <input type='date' id='expiry-date' name='expiry-date' required>
            <br>
            <label for='cvv'>CVV : </label>
            <input type='text' id='cvv' name='cvv' required>
            </div>
            <input type='submit'  name = 'pay' value='Pay'>
            </form>
            ";
        }
        else 
        {
            echo "
            <form id='payment-form' action='bill.php' method='post'>
            <h2>Payment</h2>   
            <div id='upi-details'>
            <label for='upi-id'>Enter UPI ID:</label>
            <input type='text' id='upi-id' name='upi-id' required>
            </div>
            <input type='submit'  name = 'pay' value='Pay'>
            </form>
            "; 
        }
    }
    else
    {
        
        echo "
        <form id='payment-form' action='#' method='post'>
        <h2>Payment</h2>    
        <label for='payment-method'>Select Payment Method:</label>
        <br><br>
        <label for='upi'>UPI</label>
        <input type='radio' name='payment-method' id='upi' value='upi' required >
        &nbsp; &nbsp; &nbsp; 
        <label for='card'>Card</label>
        <input type='radio' name='payment-method' id='card' value='card' required>
        <br><br>
        <input type='submit'  name = 'option' value='submit'>
        </form>
        ";
    }
?>
<div class="footer">
      <div class="copyright">
        &copy; 2024 SPECTRO GAMMING. All Rights Reserved.
      </div>
    </div>
</body>
</html>

