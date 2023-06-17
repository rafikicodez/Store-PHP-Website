<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit;
}

// Process the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validates the form 
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Perform the login check

    // For example, let's assume the user is valid if username is "admin" and password is "password"
    if ($username === 'admin' && $password === 'password') {
        // Store the user information in the session
        $_SESSION['username'] = $username;
        
        // Redirect to the welcome page
        header("Location: welcome.php");
        exit;
    } else {
        // Invalid credentials, show an error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>