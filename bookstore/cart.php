<?php
$host = "127.0.0.1"; // Replace with your database host
$dbName = "shoppingcart"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // You can set additional PDO attributes here if needed
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<?php
session_start();

function addToCart($productId, $quantity = 1)
{
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

function updateQuantity($productId, $quantity)
{
    if ($quantity > 0) {
        $_SESSION['cart'][$productId] = $quantity;
    } else {
        removeItem($productId);
    }
}

function removeItem($productId)
{
    unset($_SESSION['cart'][$productId]);
}

function displayCart()
{
    if (!empty($_SESSION['cart'])) {
        // Fetch product details from the database using the product IDs in the cart
        // Display the product name, quantity, price, subtotal, and provide options to update or remove items
    } else {
        echo "Your cart is empty.";
    }
}
?>