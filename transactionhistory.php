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
                <h2>Transaction History</h2>
                <?php
                    include 'config.php';
                    $res=mysqli_query($conn, "SELECT * FROM transaction");
                    echo"<br><br><center><table border=1>";
                    echo"<tr>
                        <th colspan=2>Sender Name</th>
                        <th colspan=3>Receiver Name</th>
                        <th colspan=4>Transaction Amount</th>
                        <th colspan=5>Transaction Date and Time</th>
                        </tr>";
                    while($row=mysqli_fetch_row($res))
                    {
                        echo"<tr>
                        <td colspan=2>$row[0]</td>
                        <td colspan=3>$row[1]</td>
                        <td colspan=4>$row[2]</td>
                        <td colspan=5>$row[3]</td>
                        </tr>";
                    }
                    echo"</table></center>";
                ?>
            </div>
        </div>
        <div class="footer1">
            <footer>
                <p>Done by Sneha Muthukumar</p>
            </footer>
        </div>  
    </body>
</html>