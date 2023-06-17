<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit;
}

// Process the registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the form data (you can add more validation if required)
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Store the user information in the session
    $_SESSION['username'] = $username;
    
    // Redirect to the welcome page
    header("Location: welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>