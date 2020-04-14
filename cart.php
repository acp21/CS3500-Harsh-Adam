<?php
    // Start session
    session_start();

    include 'config.inc.php';
    // Connect to database
    try{
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die($e -> getMessage());
    }

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
                    <a class="nav-link" href="catalog.php">Products</a>
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
        <h2 class="jumbotron"><b>Checkout</b></h2>
        <div class="row">
            <div class="col-md-12">
                <div class="items">
                    <!-- <div class="product">
                        <img src="images/products/1-main.jpg" class="product-image" alt="">
                        <h2 class="product-name">ProBook</h2>
                        <h2 class="product-price">800</h2>
                    </div> End product -->
                <?php
                    if(isset($_SESSION["cart"])){
                        foreach($_SESSION["cart"] as $id){
                            $sql = "SELECT * FROM products WHERE ID='" . $id . "'"; // Prepare sql query
                            $product = $pdo -> query($sql);
                            $row = $product -> fetch(); // Get product row

                            // Prepare variables
                            $name = $row["Name"];
                            $price = $row["Price"];
                            $imgSrc = "images/products/" . $id . "-main.jpg";

                            $output = '<div class="product">';
                            $output .= '<img src="' . $imgSrc . '" class="product-image">';
                            $output .= '<h2 class="product-name">' . $name . '</h2>';
                            $output .= '<h2 class="product-price"> $' . $price . '</h2>';
                            $output .= '</div>';

                            echo $output;

                        }
                    }
                    else{
                        echo "Cart is currently empty";
                    }
                ?>
                </div> <!-- End items -->
            </div>
        </div> <!-- End row -->
    </div> <!-- End container -->
</body>

</html>