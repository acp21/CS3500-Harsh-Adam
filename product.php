<!-- PRODUCT PAGE-->
<!-- ADAM POHL -->
<!-- WRITTEN FOR CS3500 -->
<?php
  include 'specifications.inc.php';
  include 'config.inc.php';
  // Connect to database
  try{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
      die($e -> getMessage());
  }
  if(count($_GET) >= 1){
      $id = $_GET["productID"];
  }
  else{
      echo "NO PRODUCT ID PASSED";
      // Currently process just dies if not id is passed
      // Consider rerouting to 404 page instead
      die();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Atlas Corporation</title>
    <!-- Link to Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <!-- Google fonts link -->
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <!-- Font Awesome icon link -->
    <script src="https://kit.fontawesome.com/2a7a1d5a6b.js" crossorigin="anonymous"></script>
    <!-- Scripts to run carousel -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/product.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
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
                    <li class="nav-item active">
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
            </nav>
        </div> <!-- End Navbar -->
        <div class="row">
            <!-- Product Info -->
            <div class="col-md-6">
                <div class="description">
                    <!-- Motto for laptop -->
                    <div class="text-left catch_phrase">

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <!-- Class contains product carousel -->
                <!-- Carousel scripts found on W3Schools -->
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Each item relates to a picture in the carousel -->
                    <?php
                      // PHP to control Carousel
                      // Make an output variable to store html data
                      $output = '';
                      $output .= '<div class="carousel-inner">';
                      // For each image append to output variable
                      for($i = 1; $i <= 3; $i++){
                        $output .= '<div class="carousel-item';
                        // For first image set class to active
                        if($i == 1){
                            $output .= ' active">';
                        }
                        else{
                            $output .= '">';
                        }
                        $output .= '<img src=images/products/' . $id . '-car' . $i . '.jpg width="1100" height="500">';
                        $output .='</div>';
                      }
                      $output .= '</div>';
                      echo $output;
                    ?>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div> <!-- End Carousel-->
            </div> <!-- End Column -->
        </div> <!-- End Row -->
        <div class="row">
            <!-- Laptop specs for actual laptop found on Newegg -->
            <ul class="jumbotron">
                <li class="specs">PRODUCT SPECIFICATIONS</li>
                <?php
                    // Loop through all values in $specs[$id] to get product specifications
                    foreach($specs[$id] as $val){
                      echo '<li>' . $val . '</li>';
                    }
                  ?>
            </ul>
        </div>
        <div class="row info_section">
            <div class="col-md-2">
                <!-- Left images -->
                <?php
                    // Rewrote image printing using php loops
                    $output = "";
                    for($i = 1; $i <= 3; $i++){
                      $output .= '<img class="pic" src="images/products/' .$id . '-left' . $i . '.jpg" alt="">';
                    }
                    echo $output;
                  ?>
            </div>
            <div class="col-md-8">
                <!-- Product Descrption -->
                <?php
                    $sql = "SELECT * FROM products WHERE ID='" . $id . "'";
                    $product = $pdo -> query($sql);
                    $row = $product -> fetch();
                    $description = '<p class="desc">' . $row["Description"] . "</p>";
                    echo $description;
                    $button = '<button type="button" class="btn btn-danger btn-lg"><a href="catalog.php?cart=' . $id . '">Add to Cart</a></button>';
                    echo $button;
                  ?>
            </div>
            <div class="col-md-2">
                <!-- Right Images -->
                <?php
                    $output = "";
                    for($i = 1; $i <= 3; $i++){
                      $output .= '<img class="pic" src="images/products/' .$id . '-right' . $i . '.jpg" alt="">';
                    }
                    echo $output;
                  ?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; Atlas Corporation 2020</p>
    </footer>
</body>

</html>