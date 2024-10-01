<?php
session_start();

// Prices
$prices = [
    'burger' => 50,
    'fries' => 75,
    'steak' => 150,
];

// Get selected order item and quantity from the form
$order_item = isset($_POST['order_item']) ? $_POST['order_item'] : null;
$order_qty = isset($_POST['order_qty']) ? (int)$_POST['order_qty'] : 0;

// Get cash payment from the form
$cash_payment = isset($_POST['cash_payment']) ? (float)$_POST['cash_payment'] : 0;

// Calculate total price
$total_price = ($order_qty * $prices[$order_item]);

// Check if cash payment is sufficient
$insufficient_balance = $cash_payment < $total_price;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            border: 2px dotted black;
            padding: 20px;
            width: 300px;
            margin: 20px auto;
        }
        .insufficient {
            border-color: red;
        }
        strong {
            font-weight: bold;
        }
        em {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="receipt <?php echo $insufficient_balance ? 'insufficient' : ''; ?>">
        <h1>Receipt</h1>
        <?php if (!$insufficient_balance): ?>
            <strong>Item Ordered:</strong> <?php echo ucfirst($order_item); ?><br>
            <strong>Quantity:</strong> <?php echo $order_qty; ?><br>
            <strong>Total Price:</strong> <?php echo number_format($total_price, 2); ?><br>
            <strong>Cash Payment:</strong> <?php echo number_format($cash_payment, 2); ?><br>
            <strong>Change:</strong> <?php echo number_format($cash_payment - $total_price, 2); ?><br>
            <strong>Timestamp:</strong> <em><?php echo (new DateTime("now", new DateTimeZone('Asia/Manila')))->format('Y-m-d H:i:s'); ?></em><br>
        <?php else: ?>
            Sorry, balance not enough.
        <?php endif; ?>
    </div>
</body>
</html>
