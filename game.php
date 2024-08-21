<?php 
session_start();
require('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy/Rent</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="./navstyle.css">
    <style>
      .card {
        background-color: white;
        padding: 20px;
        border-radius: 37px;
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

      form input {
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

       form input:hover {
        background-color: #4343d8;
      }

      .button
      {
        display: inline;
      }
      
    </style>
</head>
<body>
    
<ul class="topnav">
      <li class="company"><strong>Spectro Gaming</strong></li>
      <li class="right"><a href="#" ><strong >Profile</strong> : <?php echo $_SESSION["uname"]; ?></a></li>
      <li class="right"><a href="logout.php">Logout</a></li>
      <li  class="right"><a href="contect.php">Contact Us</a></li>
      <li  class="right"><a class="active" href="game.php">Home</a></li>
</ul>

<div class="card">
    
      <table>
        <tr>
            <th>Sr. No.</th>
            <th>Game</th>
            <th>Company</th>
            <th>Ratings</th>
            <th>Purchase</th>
        </tr>
		<?php
			  $i=1;
			for($i=1;$i<=10;$i++)
			 {
                    if(isset($_POST["b$i"])) 
                    {
                        $sql = "SELECT game_data.gid,game_data.game, game_data.company, game_data.ratings, game_data.mode, buy.price, buy.purchases FROM buy INNER JOIN game_data ON buy.gid=game_data.gid";
                        $result = mysqli_query($conn,$sql);
                        $buy = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        $i--;
                        $_SESSION["buygame"] = $buy["$i"]; 
                        header("Location:./buy.php");
                        break;
                    }
                    
              else if(isset($_POST["r$i"]))
              {
                $sql = "SELECT game_data.gid,game_data.game, game_data.company, game_data.ratings, game_data.mode, rent.rent_price, rent.rent_period, rent.rents FROM rent INNER JOIN game_data ON rent.gid=game_data.gid";
                        $result = mysqli_query($conn,$sql);
                        $rent = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        $i--;
                        $_SESSION["rentgame"] = $rent["$i"]; 
                        header("Location:./rent.php");
                        break;
                
				
              }
            }

?>
        <?php
              
            
            $sql = "SELECT * FROM `game_data`";
            $result = mysqli_query($conn,$sql);
            $sr = 1;
            while($row = mysqli_fetch_assoc($result))
            {
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td>
					
                  <form method = 'post'  class='button'>
                    <input type = 'submit'  name = 'b$sr' value = 'Buy'>
                  </form>
                  <form method = 'post'  class='button'>
                      <input type = 'submit'  name = 'r$sr' value = 'Rent'>
                  </form>
                </td>
                </tr>
                ";
                $sr++;
            }
        ?> 
      </table>

</div>
<div class="footer">
      <div class="copyright">
        &copy; 2024 SPECTRO GAMMING. All Rights Reserved.
      </div>
</body>
</html>

 <?php
 		    // $i=1;
			//  $result = mysqli_query($conn,$sql);
			//  for($i=1;$i<=10;$i++)
			//  {
			// 	      $rent = mysqli_fetch_assoc($result);
            //   if(isset($_POST["b$i"]))
            //   {
			// 	$_SESSION["buygame"] = $rent;
            //     echo "It is a buy button of  $i game<br>";
            //     header("Location:./buy.php");
            //   }
            //   else if(isset($_POST["r$i"]))
            //   {
            //     echo "It is a rent button of  $i game<br>";
            //     echo "<br>";
                
				
            //   }
            // }

?> 