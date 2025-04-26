<?php
// 1. MySQL Connection
$host = "localhost:3306";
$user = "root"; // change this if you use a different username
$password = ""; // add your password if you have one
$database = "ecomdata"; // your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 2. Fetch products
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Elite Store</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Navigation -->
<nav>
  <div class="logo"></div>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="product.html">Products</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="contact.html">Contact</a></li>
  </ul>
</nav>

<!-- Hero Section -->
<section class="hero">
  <img src="IMAGE/WhatsApp Image 2025-04-20 at 10.08.56_07e5f8e0.jpg" alt="gadget store banner" class="hero-image"> 
  <div class="hero-text">
    <h1>Welcome to Elite Store</h1>
    <p>Your one-stop shop for all your gadgets</p>
    <a href="shopnow.html" class="hero-btn">Shop Now</a>
  </div>
</section>

<!-- Products Section -->
<section class="container">
  <h2 class="section-title">Featured Products</h2>
  <div class="products">

    <?php
    // 3. Display products in HTML
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="product-card">
          <img src="' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '" />
          <h3>' . htmlspecialchars($row['name']) . '</h3>
          <p>' . htmlspecialchars($row['description']) . '</p>
          <div class="price">₹' . number_format($row['price'], 2) . '</div>
          <a href="#" class="buy-button">Buy Now</a>
        </div>
        ';
      }
    } else {
      echo "<p>No products found.</p>";
    }

    $conn->close();
    ?>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 Elite Store | All Rights Reserved</p>
</footer>

</body>
</html>
