<?php
require("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Final Bill</title>
<link rel="stylesheet" href="styles.css" />
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 20px;
    }
    .bill-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }
    h2 {
        margin-top: 0;
        color: #333;
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .total-row td {
        border-top: 2px solid #333;
    }
    .total-row td:first-child {
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="bill-container">
    <h2>Final Bill</h2><br><hr><br>
    <?php
    $mobilenumber = 0;
    $emailid;
    $address;
    $sql = "SELECT * FROM `user_details`";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($row["username"] == $_SESSION["uname"])
        {
            $mobilenumber = $row["mobilenumber"];
            $emailid = $row["emailid"];
            $address = $row["address"];
            break;
        }
    }
    $time = date('Y-m-d'); echo "<strong>Date : </strong>".$time."<br><br><hr><br>";
    echo "
    <p><strong>Name:</strong>".$_SESSION['uname']."</p><br>
    <p><strong>Number:</strong> $mobilenumber</p><br>
    <p><strong>Email-id:</strong> $emailid</p><br>
    <p><strong>Address:</strong> $address</p><br><hr><br>
    <table>
        
        ";

        if(isset($_SESSION["buygame"]))
    {
        $buyrow = $_SESSION["buygame"];
        $purchase = $buyrow["purchases"] + 1;
        $gid = $buyrow["gid"];
        $sql = "UPDATE `buy` SET `purchases`='$purchase' WHERE `gid` = '$gid'";
        $result = mysqli_query($conn,$sql);
       // echo $buyrow["purchases"]." buy purchases<br>";
       /* $buyrow = $_SESSION["buygame"];
        $sql = "SELECT * FROM `buy`";
        $result = mysqli_query($conn,$sql);
        $brow;
        while($brow = mysqli_fetch_assoc($result))
        {
            if($brow["gid"] ==  $buyrow["gid"])
            {
                $purchase = $brow["purchases"] + 1;
                $gid = $brow["gid"];
                $tsql = "UPDATE `buy` SET `purchases`='$purchase' WHERE `gid` = '$gid'";
                $tresult = mysqli_query($conn,$tsql);
                echo $brow["purchases"]."<br>";
            }
        }*/
        if(isset($_SESSION["cd"]) and $buyrow["mode"] == "CD/Download")
        {
            $gid = $buyrow["gid"]-1;
            $sql = "SELECT * FROM `game_stock`";
            $result = mysqli_query($conn,$sql);
            $stock;
            while($srow = mysqli_fetch_assoc($result))
            {
                if($srow["sid"] == $gid)
                {
                    $stock = $srow["stock"] - 1;
                    $updatesql = "UPDATE `game_stock` SET `stock`='$stock' WHERE `sid` = '$gid'";
                    $updateres = mysqli_query($conn,$updatesql);
                    unset($_SESSION["cd"]);
                    unset($_SESSION["buygame"]);
                    break;
                }
            }
            // var_dump($row); 
            //echo $stock." buy stock<br>";
        }
        echo "
        <thead>
            <tr>
                <th>Game</th>
                <th>Company</th>                
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <td>".$buyrow['game']."</td>
        <td>".$buyrow['company']."</td>
        <td>₹ ".$buyrow['price']."</td>
        </tr>
        ";
    }
    else if(isset($_SESSION["rentgame"]))
    {
        $rentrow = $_SESSION["rentgame"];
        $rent = $rentrow["rents"] + 1;
        $gid = $rentrow["gid"];
        $sql = "UPDATE `rent` SET `rents`='$rent' WHERE `gid` = '$gid'";
        $result = mysqli_query($conn,$sql);
       // echo $rentrow["rents"]." rents<br>";
       
        if(isset($_SESSION["cd"]) and $rentrow["mode"] == "CD/Download")
        {
            $gid = $rentrow["gid"]-1;
            $sql = "SELECT * FROM `game_stock`";
            $result = mysqli_query($conn,$sql);
            $stock;
            while($srow = mysqli_fetch_assoc($result))
            {
                if($srow["sid"] == $gid)
                {
                    $stock = $srow["stock"] - 1;
                    $updatesql = "UPDATE `game_stock` SET `stock`='$stock' WHERE `sid` = '$gid'";
                    $updateres = mysqli_query($conn,$updatesql);
                    unset($_SESSION["cd"]);
                    unset($_SESSION["rentgame"]);
                    break;
                }
            }
            // var_dump($row); 
            //echo $stock." rent stock<br>";
        }
        echo "
        <thead>
            <tr>
                <th>Game</th>
                <th>Company</th>                
                <th>Price</th>
                <th>Rent Period</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <td>".$rentrow['game']."</td>
        <td>".$rentrow['company']."</td>
        <td>₹ ".$rentrow['rent_price']."</td>
        <td>".$rentrow['rent_period']." months</td>
        </tr>
        ";
    }

          echo "  
        </tbody>
        
    </table>
    ";
    ?>
    <p><strong>Shop Name:</strong> Spectro Gamming</p><br>
    <p>Thank you for shoping with us...</p>
    <!-- <p><strong>Shop Address:</strong> UPLETA-360490,GUJARAT</p> -->
</div>
<br><br><center><a href="game.php">Press here To continue ...</a></center>


    <!-- <script>
        // JavaScript to listen for Enter key press and trigger the link
        document.addEventListener("keydown", function(event) 
        {
            if (event.key === "Enter") 
            {
                // Get the URL from the anchor element
                var url = document.getElementById("jumpLink").href;
                // Navigate to the URL
                window.location.href = url;
            }
        });
    </script> -->
    <!-- <div class="footer">
      <div class="copyright">
        &copy; 2024 SPECTRO GAMMING. All Rights Reserved.
      </div>
    </div> -->
</body>
</html>