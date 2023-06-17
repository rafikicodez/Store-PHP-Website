<?php
$host = "127.0.0.1";
$dbName = "Cart"; 
$username = "root"; 
$password = ""; 

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<?php
session_start();

// Check if the user is logged in or redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Check if the cart is empty or redirect to the cart page
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}


// Calculate the total amount
$totalAmount = 0;

// Get product details from the database using the product IDs in the cart
foreach ($_SESSION['cart'] as $productId => $quantity) {
    // Retrieve product details from the database based on the product ID

    // Perform necessary calculations
    $subtotal = $quantity * $product['price'];
    $totalAmount += $subtotal;

    $orderQuery = "INSERT INTO orders (book_id, quantity, subtotal) VALUES ('$productId', '$quantity', '$subtotal')";
    
}
unset($_SESSION['cart']);

// Display the order summary to the user
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h2>Order Summary</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through the order details and display them -->
            <?php foreach ($orderDetails as $order): ?>
                <tr>
                    <td><?php echo $order['book_name']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['price']; ?></td>
                    <td><?php echo $order['subtotal']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td><?php echo $totalAmount; ?></td>
            </tr>
        </tfoot>
    </table>

    <!-- Provide any additional details or payment processing options here -->
    

</body>
</html>