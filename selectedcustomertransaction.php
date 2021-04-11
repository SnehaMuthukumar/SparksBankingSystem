<?php
    include 'config.php';
    if(isset($_POST['submit']))
    {
        $from = $_GET['accountnumber'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];
        $sql = "SELECT * from customers where accountnumber=$from";
        $query = mysqli_query($conn,$sql);
        $sql1 = mysqli_fetch_array($query); 
        $sql = "SELECT * from customers where accountnumber=$to";
        $query = mysqli_query($conn,$sql);
        $sql2 = mysqli_fetch_array($query);
        if (($amount)<0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Negative values cannot be transferred")'; 
            echo '</script>';
        }
        else if($amount > $sql1['balance']) 
        {
            echo '<script type="text/javascript">';
            echo ' alert("Insufficient Balance")';  
            echo '</script>';
        }
        else if($amount == 0)
        {
            echo "<script type='text/javascript'>";
            echo "alert('Zero value cannot be transferred')";
            echo "</script>";
        }
        else 
        {
            $newbalance = $sql1['balance'] - $amount;
            $sql = "UPDATE customers set balance=$newbalance where accountnumber=$from";
            mysqli_query($conn,$sql);
            $newbalance = $sql2['balance'] + $amount;
            $sql = "UPDATE customers set balance=$newbalance where accountnumber=$to";
            mysqli_query($conn,$sql);
            $sender = $sql1['name'];
            $receiver = $sql2['name'];
            $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
            $query=mysqli_query($conn,$sql);
            if($query)
            {
                echo "<script> alert('Transaction Successful');
                            window.location='transactionhistory.php';
                        </script>";
            }
            $newbalance= 0;
            $amount =0;
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sparks Banking System</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="bank_icon.jpeg" type="image/icon type">
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <h1><a href="index.html">Sparks Banking System</a></h1>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="ViewAllCustomers.php">View all Customers</a></li>
                        <li><a href="CustomerDetailFetch.php">View a Customer's Details</a></li>
                        <li><a href="transact.php">Start a Transaction</a></li>
                        <li><a href="transactionhistory.php">Transaction History</a></li>
                    </ul>
            </div>
            <?php
                include 'config.php';
                $sid=$_GET['accountnumber'];
                $sql = "SELECT * FROM customers where accountnumber=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit"><br>
                <div class="allcustomers">
                    <center>
                        <table border=1>
                            <tr>
                                <th colspan=2>Account Number</th>
                                <th colspan=3>Name</th>
                                <th colspan=4>E-Mail</th>
                                <th colspan=5>Phone Number</th>
                                <th colspan=6>City</th>
                                <th colspan=7>State</th>
                                <th colspan=8>Balance</th>
                            </tr>
                            <tr>
                                <td colspan=2><?php echo $rows['accountnumber'] ?></td>
                                <td colspan=3><?php echo $rows['name']?></td>
                                <td colspan=4><?php echo $rows['email']?></td>
                                <td colspan=5><?php echo $rows['phonenumber']?></td>
                                <td colspan=6><?php echo $rows['city']?></td>
                                <td colspan=7><?php echo $rows['state']?></td>
                                <td colspan=8><?php echo $rows['balance']?></td>
                            </tr>
                        </table>
                    </center>
                    <br><br><br>
                    <label>Transfer To:</label>
                    <select name="to" required>
                        <option value="" disabled selected>Choose</option>
                        <?php
                            include 'config.php';
                            $sid=$_GET['accountnumber'];
                            $sql = "SELECT * FROM customers where accountnumber!=$sid";
                            $result=mysqli_query($conn,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $rows['accountnumber'];?>">
                            <?php echo $rows['name'] ;?> 
                        </option>
                        <?php 
                            } 
                        ?>
                        <div>
                    </select>
                    <br>
                    <br>
                    <label>Amount:</label>
                    <input type="number" name="amount" required>   
                    <br><br>
                        <div>
                            <button name="submit" type="submit">Transfer</button>
                        </div>
                </form>
            </div>
        </div>
        </div>
        <div class="footer1">
            <footer>
                <p>Done by Sneha Muthukumar</p>
            </footer>
        </div>  
    </body>
</html>