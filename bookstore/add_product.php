<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the form data
    $productName = $_GET["product_name"];
    $productPrice = $_GET["product_price"];

    // add logic to process the form data
    // database info here also
    
    // Redirect back to index.php or any other page
    header("Location: index.php");

    function getProducts() {
        // Include the database connection file
        require_once 'admin/db_connect.php';
    
        // Prepare the SQL statement to fetch the products
        $sql = "SELECT * FROM books";
    
        // Execute the SQL statement
        $result = $mysqli->query($sql);
    
        // Check if the query was successful
        if ($result) {
            $products = array(); // Initialize an empty array
    
            // Fetch the products from the result set
            while ($row = $result->fetch_assoc()) {
                $products[] = $row; // Add each row to the array
            }
    
            // Free the result set
            $result->free();
    
            // Close the database connection
            $mysqli->close();
    
            return $products;
        }
    }
    exit;
    
}
?>