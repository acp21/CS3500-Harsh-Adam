<?php
    //Include Data Base Config
    include 'config.inc.php';
    //Create a session if one was not already created
    include 'create_session.inc.php';
    //Set values in the data base entry for session specefic data
    include 'append_user_session_data.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Atlas Corporation</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/catalog.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="javascript/catalog.js"></script>
</head>
<body>
  <!--   Main Bootstrap Container -->
  <div class="container-fluid">

    <div class="row">
      <!-- Navigation Bar -->
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
    </div>

    <nav>
      <!-- Product Page Vertical Navigation -->
      <ul class=" nav flex-column main_page_vertical_nav">
        <li class="nav-item">
          <a class="nav-link" href="#">ProBook</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pro_watch">ProWatch</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pro_phone">ProPhone</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pro_monitor">ProMonitor</a>
        </li>
      </ul>
    </nav>

    <!-- List of all the Products with Alternating side the picture/description is on -->
    <section id="product_1">
      <div class="row product">
        <div class="col-md-6 product_image_left">
          <img src="images/lap-front.jpg" class="img-fluid main_products" alt="ProBook" title="ProBook">
        </div>
        <div class="col-md-6 product_description_right">
          <h4 class="jumbotron">Atlas Corporation Presents the ProBook</h4>
          <h5>The Pro Book is a revolutionary product that boasts top of the line specs. The internal hardware is 7 years ahead of anything found on the market. The Pro Book allows you to multitask without the fear of being bogged down. We wanted to deliver a piece of hardware that allowed our users to game at the finest settings while also being able to carry the device around with no difficulty.</h5><br>
          <a href="product.php?productID=1">Learn More</a>
          <button type="button" class="btn btn-primary"><a href="?cart=1">Add to Cart</a></button>
        </div>   
      </div>
    </section>

    <section id="product_2">
      <div class="row product" id ="pro_watch">
        <div class="col-md-6 product_description_left">
          <h4 class="jumbotron">Atlas Corporation Presents the ProWatch</h4>
          <h5>The Pro Watch is a anomonly of hardware and software brought to your wrist. We have engineered and then engineered further to give you the power everyone is used from the Pro Phone in the Pro Watch. Capable of taking calls, texting, and playing games the Pro Watch is ready for anything your day entails. Afraid of getting it wet? Not to worry the Pro Watch is completely waterproof and dustproof. Take your day on with no hesitation of the Pro Watch slowing you down. </h5><br>
          <a href="product.php?productID=2">Learn More</a>
          <button type="button" class="btn btn-primary"><a href="?cart=2">Add to Cart</a></button>
        </div>   
        <div class="col-md-6 product_image_right">
          <img src="images/smart-watch.jpg" class="img-fluid main_products" alt="ProWatch" title="ProWatch">
        </div>
      </div>
    </section>

    <section id="product_3">
      <div class="row product" id ="pro_phone">
        <div class="col-md-6 product_image_left">
          <img src="images/phone.jpg" class="img-fluid main_products" alt="ProPhone" title="ProPhone">
        </div>
        <div class="col-md-6 product_description_right">
          <h4 class="jumbotron">Atlas Corporation Presents the ProPhone</h4>
          <h5>Atlas Corporation has taken a fan favorite and had the audacity to re imagine what a phone is. With the brand new advanced virtualization technology driven by artificial intelligence the Pro Phone is ready to tackle any problem that will come its way. With this new technology we are able to provide better cell service and capture photots and videos a lot better because of the in built AI.</h5><br>
          <button type="button" class="btn btn-primary"><a href="?cart=3">Add to Cart</a></button>
        </div>   
      </div>
    </section>

    <section id="product_4">     
      <div class="row product" id ="pro_monitor">
        <div class="col-md-6 product_description_left">
          <h4 class="jumbotron">Atlas Corporation Presents the ProMonitor</h4>
          <h5>Without the proper tools even the greatest minds in the world would have been nothing. That is why here at Atlas Corporation it is out top priority to bring you the most effecient tools to get the job done. Introducing the Pro Monitor which not only provides you a visual on your work, but it can also help you multi task with in build smart prediction technologies. We take our job seriously, so that you can take yours seriously.</h5><br>
          <button type="button" class="btn btn-primary"><a href="?cart=4">Add to Cart</a></button>
        </div>   
        <div class="col-md-6 product_image_right">
          <img src="images/monitor.jpg" class="img-fluid main_products" alt="ProMonitor" title="ProMonitor">
        </div>  
      </div>  
    </section>

  </div>
<footer>
    <p>&copy; Atlas Corporation 2020</p>
</footer>
</body>
</html>