<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
</head>
<body>
  <h2>Add a Book</h2>
  <form action="add_product.php" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br><br>

    <label for="author">Author:</label>
    <input type="text" name="author" id="author" required><br><br>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description" rows="5" cols="40" required></textarea><br><br>

    <input type="submit" value="Add Book">
  </form>

  <?php

// Include the database connection file
require_once 'admin/db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Prepare the SQL statement
    $sql = "INSERT INTO books (name, price, description) VALUES (?, ?, ?)";

    // Prepare and bind the parameters
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sds", $name, $price, $description);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Book submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $mysqli->close();
}

?>

</body>
</html>