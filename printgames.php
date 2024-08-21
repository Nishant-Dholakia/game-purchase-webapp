<?php
            require('connection.php');
            $sql = "SELECT * FROM `game_data`";
            $result = mysqli_query($conn,$sql);
            $sr = 1;
                //1
                $row = mysqli_fetch_assoc($result);
                echo
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b1'>Buy</button> &nbsp;&nbsp;<button name = 'r1'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //2
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b2'>Buy</button> &nbsp;&nbsp;<button name = 'r2'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //3
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b3'>Buy</button> &nbsp;&nbsp;<button name = 'r3'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //4
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b4'>Buy</button> &nbsp;&nbsp;<button name = 'r4'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //5
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b5'>Buy</button> &nbsp;&nbsp;<button name = 'r5'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //6
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b6'>Buy</button> &nbsp;&nbsp;<button name = 'r6'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //7
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b7'>Buy</button> &nbsp;&nbsp;<button name = 'r7'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //8
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b8'>Buy</button> &nbsp;&nbsp;<button name = 'r8'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //9
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b9'>Buy</button> &nbsp;&nbsp;<button name = 'r9'>Rent</button></td>
                </tr>
                ";
                $sr++;
                //10
                $row = mysqli_fetch_assoc($result);
                echo 
                "
                <tr>
                <td>".$sr."</td>
                <td>".$row['game']."</td>
                <td>".$row['company']."</td>
                <td>".$row['ratings']."⭐</td>
                <td><button name = 'b10'>Buy</button> &nbsp;&nbsp;<button name = 'r10'>Rent</button></td>
                </tr>
                ";
                $sr++;
        ?>