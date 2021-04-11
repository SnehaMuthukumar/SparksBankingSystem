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
            <div class="SingleCustomer">
                <h1>Enter the Account Number of the Customer whose details is to be displayed</h1>
                <br><br>
                <form action="display.php" method="post">
                    <label id="label1">Account Number : </label>
                    <input type="number" name="accno">
                    <br><br><br>
                    <button type="submit">Fetch Details</button>
                </form>
            </div>
        </div>
        <div class="footer1">
            <footer>
                <p>Done by Sneha Muthukumar</p>
            </footer>
        </div>    
    </body>
</html>