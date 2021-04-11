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
            <div class="allCustomers">
                <h2>Details of all Customers registered with Sparks Banking System</h2>
                <?php
                    include 'config.php';
                    $res=mysqli_query($conn, "SELECT * FROM customers");
                    echo"<br><br><center><table border=1>";
                    echo"<tr>
                        <th colspan=2>Account Number</th>
                        <th colspan=3>Name</th>
                        <th colspan=4>Email ID</th>
                        <th colspan=5>Phone Number</th>
                        <th colspan=6>City</th>
                        <th colspan=7>State</th>
                        <th colspan=8>Balance</th>
                    </tr>";
                    while($row=mysqli_fetch_row($res))
                    {
                        echo"<tr>
                        <td colspan=2>$row[0]</td>
                        <td colspan=3>$row[1]</td>
                        <td colspan=4>$row[2]</td>
                        <td colspan=5>$row[3]</td>
                        <td colspan=6>$row[4]</td>
                        <td colspan=7>$row[5]</td>
                        <td colspan=8>$row[6]</td>
                        </tr>";   
                    }
                    echo"</table></center>";
                ?>
                <br>
            </div>
        </div>
        <footer>
            <div class="footer1">
                <p>Done by Sneha Muthukumar</p>
            </div> 
        </footer>
    </body>
</html>