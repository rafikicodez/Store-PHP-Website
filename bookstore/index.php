<!DOCTYPE html>
<link rel="stylesheet" href="CSS/MyStyles.css">
<html>
    <!-- Nicholas DiCicco, for my project I chose a BookStore-->
<head>
    <title>DiCicco's BookStore</title>
    <!-- Add your CSS and JavaScript links here -->
</head>
<body>
    <?php include 'header.php'; ?>
    
    <!-- Add your page content here -->
    <h1>Welcome to My BookStore!</h1>
    <p>This is the homepage.</p>

    <form action="add_product.php" method="get">
  <button type="submit">Add Book</button>
</form>
    <?php include 'footer.php'; ?>
    
</body>
</html>