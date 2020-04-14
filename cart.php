<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Atlas Corporation</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Navbar -->
                <nav class="navbar navbar-expand-sm  navbar-dark fixed-top" id="navigation">
                    <!-- Brand/Logo -->
                    <a class="navbar-brand" href="index.php">
                      <img src="images/Company-Logo.png" alt="Atlas Corporation" title="Atlas Corporation">
                    </a>
                    <!-- Pages -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="catalog.html">Products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="weather.php">Weather</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact_us.html">Contact Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="log_in.html">Log In</a>
                      </li>
                    </ul> 
                  </nav> <!-- End Navbar -->
        </div> <!-- End row -->
    </div> <!-- End container -->
</body>
</html>