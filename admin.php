<?php 
session_start();
require('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="./navstyle.css">
    <style>
		body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    height: 100vh;
    /* width: 90vw; */
        }
      .card {
		background-color: #fff;
		border-radius: 8px;
		padding: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		width: 70%;
		margin: auto;
		margin-top: 2%;
    
        }
       /* Table styles */
       table {
        width: 100%;
        border-collapse: collapse;
      }

      table th,td {
        border: 1px solid #ddd;
        padding: 10px;
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
    form input {
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

	  .number {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: aliceblue;
            font-size: 16px;
			color: #333;
        }
		.number:hover{
			background-color: #f5f5f5;
		}

       form input:hover {
        background-color: #4343d8;
      }
    </style>
</head>
<?php
	if(isset($_POST["stock_update"]))
	{
			$ssql = "SELECT * FROM `game_stock`";
		$sresult = mysqli_query($conn,$ssql);
		for($i = 1;$i <=10;$i++)
		{
			$srow = mysqli_fetch_assoc($sresult);
				if(isset($_POST["update$i"]))
				{
					// echo $srow["stock"]."hi update  " .$_POST["stock_update"]."<br>";
					$updatestock =$srow["stock"] + $_POST["stock_update"];
					if($updatestock < 0)
					{
						echo "<script type='text/javascript'>alert('Enter valid stock to update...');</script>";
            echo "<script type='text/javascript'>window.location.href = '#';</script>";
        
					}
					else
					{
						$updatesql = "UPDATE `game_stock` SET `stock`='$updatestock' WHERE 
						`sid` = '$i'";
						$updateres = mysqli_query($conn,$updatesql);
						 $_POST = array();
						 unset($_POST);
					}
				}
				
		}
	}
	// else
	// {
	// 	echo "No updation<br>";
	// }

?>
<body>
    <ul class="topnav">
      	<li class="company"><strong>Spectro Gaming</strong></li>
		<li class="right"><h3><a href="#" ><strong >Profile</strong> : <?php echo $_SESSION['admin']; ?></a></h3></li>
		<li class="right"><a href="logout.php">Logout</a></li>
    </ul>

    <div class="card">
		<form action="#" method="post">
			<hr><br><label for="stock_update">Enter stock to update : </label>
			<input class="number" type = "number" name = "stock_update" id = "stock_update" >
		(Enter negative number to decrease stock and positive number to increase stock)<br><br><hr><br>
	  <br>
      <table>
        <tr>
            <th>Sr. No.</th>
            <th>Game</th>
            <th>Company</th>
			<th>Current stock</th>
            <th>Stock update</th>
        </tr>
        <?php
            
            $sql = "SELECT * FROM `game_data`";
            $result = mysqli_query($conn,$sql);
			$stocksql = "SELECT * FROM `game_stock`";
			$stockresult = mysqli_query($conn,$stocksql);
            $sr = 1;
            while($row = mysqli_fetch_assoc($result))
            {
				$stockrow =  mysqli_fetch_assoc($stockresult);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$stockrow['stock']."</td>
                <td>
					
                    <input type = 'submit'  name = 'update$sr' value = 'Update'>
                </td>
                </tr>
                ";
                $sr++;
            }
        ?> 
      </table>
	  </form>
    </div>

    <!-- <div class="card">
        Admin CRUD operations :
        <br><br>

    </div> -->
	
</body>
</html>