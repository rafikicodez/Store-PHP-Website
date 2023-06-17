<?php
$host = "127.0.0.1";
$dbName = "shoppingcart"; 
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

<!DOCTYPE html>
<html>
<head>
    <title>Product Upload</title>
</head>
<body>
    <h2>Upload Product</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" required></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required><br><br>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>

    <?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Process uploaded image
    $targetDir = 'Uploads/';
    $imageName = $_FILES['image']['name'];
    $targetPath = $targetDir . $imageName;

    // Move the uploaded image to the "Uploads" folder
    move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

    header('Location: success.php');
    exit;
}
?>
</body>
</html>