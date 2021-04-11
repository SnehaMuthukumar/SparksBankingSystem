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
                        <li><a href="customerdetailfetch.php">View a Customer's Details</a></li>
                        <li><a href="transact.php">Start a Transaction</a></li>
                        <li><a href="transactionhistory.php">Transaction History</a></li>
                    </ul>
            </div>
            <?php
                include 'config.php';
                $sql = "SELECT * FROM customers";
                $result = mysqli_query($conn,$sql);
            ?>
            <div class="allCustomers1">
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
                            <th colspan=9>Operation</th>
                        </tr>
                        <?php 
                            while($rows=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td colspan=2><?php echo $rows['accountnumber'] ?></td>
                            <td colspan=3><?php echo $rows['name']?></td>
                            <td colspan=4><?php echo $rows['email']?></td>
                            <td colspan=5><?php echo $rows['phonenumber']?></td>
                            <td colspan=6><?php echo $rows['city']?></td>
                            <td colspan=7><?php echo $rows['state']?></td>
                            <td colspan=8><?php echo $rows['balance']?></td>
                            <td colspan=9><a href="selectedcustomertransaction.php?accountnumber= <?php echo $rows['accountnumber'] ;?>"> <button type="button">Transact</button></a></td> 
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </center>
            </div>
        </div>
        <div class="footer1">
            <footer>
                <p>Done by Sneha Muthukumar</p>
            </footer>
        </div>  
    </body>
</html>