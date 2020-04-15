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
    <!-- Catalog.css reuses modal code -->
    <link rel="stylesheet" href="css/catalog.css">
    <link rel="stylesheet" href="css/cart.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/catalog.js"></script>
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
                    <a class="nav-link" href="cart.php">Cart</a>
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
                    <!-- PHP loop to print out each product in cart -->
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

                            $output = '<div class="product-box">';
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

            </div> <!-- End Column -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchase_modal">Payment Information</button>

            <!-- Modal -->
            <div id="purchase_modal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Purchase Form</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Checkout Modal -->
                        <div class="modal-body">
                            <!-- Container for Modal Content -->
                            <div class="container">
                                <!-- Form to collect to input -->
                                <form class="checkout_form" method="POST">
                                    <label class="checkout_info_label">Personal Information</label>
                                    <!-- Name -->
                                    <div class=row>
                                        <div class="col">
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="First Name" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class=row>
                                        <input type="text" name="streetAddress" class="form-control"
                                            placeholder="Street Address" required><br>

                                        <input type="text" name="optionalAddress" class="form-control"
                                            placeholder="Apt, Suite, or Building (Optional)">
                                    </div>
                                    <div class=row>
                                        <div class="col">
                                            <input type="text" name="location" class="form-control"
                                                placeholder="City, State" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="zipcode" class="form-control"
                                                placeholder="Zip Code" required>
                                        </div>
                                    </div>

                                    <label class="checkout_info_label">Billing Information</label>
                                    <!-- Credit Card -->
                                    <div class="row">
                                        <input type="text" name="creditCard" class="form-control"
                                            placeholder="Card Number (No Spaces)" required>
                                    </div>
                                    <div class=row>
                                        <div class="col">
                                            <input type="date" name="expiration" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <input type="password" name="cvv" class="form-control" placeholder="CVV"
                                                required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary place_order_button" data-dismiss="">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End row -->


    </div> <!-- End container -->
</body>

</html>