<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 20%; /* Adjust the width of the menu table */
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Menu</h1>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>Burger</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Fries</td>
            <td>75</td>
        </tr>
        <tr>
            <td>Steak</td>
            <td>150</td>
        </tr>
    </table>

    <h2>Order Form</h2>
    <form action="receipt.php" method="post">
        <label for="order_item">Select an Order:</label>
        <select id="order_item" name="order_item" required>
            <option value="burger">Burger</option>
            <option value="fries">Fries</option>
            <option value="steak">Steak</option>
        </select><br><br>

        <label for="order_qty">Quantity:</label>
        <input type="number" id="order_qty" name="order_qty" min="1" required><br><br>

        <label for="cash_payment">Cash Payment:</label>
        <input type="number" id="cash_payment" name="cash_payment" min="0" step="0.01" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>