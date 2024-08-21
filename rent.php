<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy <?php echo $i ?> </title>
	<link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./navstyle.css">
    <style>
		body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    height: 100vh;
}
      .card {
		background-color: #fff;
		border-radius: 8px;
		padding: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		width: 45%;
		margin: auto;
		margin-top: 15%;
      }
      /* Table styles */
      table {
        width: 100%;
        border-collapse: collapse;
        
      }

      table th,td {
        border: 1px solid #ddd;
        padding: 15px;
      }

      table th {
        background-color: #f5f5f5;
        color: #333;
        text-align: center;
        font-weight: 900;
	  }
	  .game
	  {
		text-align: center;
	  }
	  .game:hover
	  {
		text-decoration: underline;
		text-decoration-color: purple;
	  }
	  .companyname
	  {
		width: 70%;
		margin:auto;
		text-align: end;
	  }
	  .buy
	  {
		padding: 5px;
		width: 40%;
		text-align: center;
		background-color: blue;
		border-radius: 20px;
		color: white;
		font-size: large;
		font-weight: 600;
	  }
	  .buy:hover
	  {
		text-decoration: underline;
		text-decoration-color: white;
		background-color: blueviolet;
	  }
	  .buyform
	  {
		display: inline;
	  }
    </style>
</head>
<?php

	  if(isset($_POST["cd"]))
	  {
		$_SESSION["cd"] = "yes";
		header("location:pay.php");
	  }

?>
<body>
	<ul class="topnav">
      	<li class="company"><strong>Spectro Gaming</strong></li>
		  <li class="right"><a href="#" ><strong >Profile</strong> : <?php echo $_SESSION["uname"]; ?></a></li>
    </ul>
        <?php
            require('connection.php'); 
            $sr = 1;
            $row = $_SESSION["rentgame"];
        ?>       
        <div class="card">
            <div class="game"><h1><?php echo $row["game"]?></h1></div>
            <br>
            <div class="companyname"><h3><?php echo $row["company"]?></h3></div>
            <br>
            <span class="rating">Ratings : <?php echo $row["ratings"]."⭐"?></span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="downloads"><?php echo $row["rents"]?> Rents</span>
            <br><br>
            <h4 class="time">Rent time period : <?php echo $row["rent_period"]?> Months</h4>
            <br><br><br>
            <a href="./pay.php"><button class="buy">Rent game : ₹ <?php echo $row["rent_price"]?></button></a>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			<?php
				$gid = $row["gid"]-1;
				$ssql = "SELECT * FROM `game_stock`";
				$sresult = mysqli_query($conn,$ssql);
				
				while($srow = mysqli_fetch_assoc($sresult))
				{
					if($srow["sid"] == $gid)
						break;
				}
				if($row["mode"] == "CD/Download" and $srow["stock"] > 0)
				{
					echo "<form action = '#' method = 'post' class = 'buyform'>
					<input type = 'submit' class = 'buy' name = 'cd' value ='Rent CD : ₹".$row['rent_price']."'>
					</form>
					";
				}
			?>
        </div>   
		<div class="footer">
      <div class="copyright">
        &copy; 2024 SPECTRO GAMMING. All Rights Reserved.
      </div>
    </div>
</body>
</html>