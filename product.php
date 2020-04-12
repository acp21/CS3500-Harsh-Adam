<!-- PRODUCT PAGE-->
<!-- ADAM POHL -->
<!-- WRITTEN FOR CS3500 -->
<?php
  // Connect to database
  try{
    $connString = "mysql:host=localhost;dbname=authorized_users";
    $user = "testuser";
    $pass = "mypassword";

    $pdo = new PDO($connString, $user, $pass);
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
                    <a class="navbar-brand" href="index.html">
                      <img src="images/Company-Logo.png" alt="Atlas Corporation" title="Atlas Corporation">
                    </a>
                    <!-- Pages -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="catalog.html">Products</a>
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
            </div>  <!-- End Row -->
            <div class="row">
              <!-- Laptop specs for actual laptop found on Newegg -->
                <ul class="jumbotron">
                  <li class="specs">PRODUCT SPECIFICATIONS</li>
                  <li>Intel Core i5 10th Gen 1035G1</li>
                  <li>8 GB LPDDR4 Memory 512 GB SSD</li>
                  <li>Intel UHD Graphics</li>
                  <li>1920 x 1080 Display</li>
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
                    $sql = "SELECT * FROM Products WHERE ID='" . $id . "'";
                    $product = $pdo -> query($sql);
                    $row = $product -> fetch();
                    $description = '<p class="desc">' . $row["Description"] . "</p>";
                    echo $description;
                  ?>
                  <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target=".modal">BUY NOW</button>
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
            <!-- Buy now button opens a modal for user to enter details -->
            <div class="modal fade" id="purchase">
              <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <!-- Modal header just has text -->
                      <div class="modal-header">
                          <h4 class="modal-title">Purchase Details</h4>
                      </div>
                      <!-- Modal body, contains form for input -->
                      <div class="modal-body">
                        <div class="contactform">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="name"><b>Name</b></label>
                              <input type="text" placeholder="Enter name" class="form-control" id="name" name="name">
                            </div>
                            <div class="col-md-6">
                              <label for="address"><b>Street Address</b></label>
                              <input type="text" placeholder="Enter Address" class="form-control" id="address" name="address">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label for="city"><b>City</b></label>
                              <input class="form-control" type="text" name="city" id="city" placeholder="Enter City">
                            </div>
                            <div class="col-md-6">
                              <label for="zip"><b>Zip Code</b></label>
                              <input class="form-control" type="text" name="zip" id="zip" placeholder="Enter zip code">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="state"><b>State</b></label>
                            <!-- Drop down list containing all 50 states -->
                            <select name="state" id="state" class="form-control">
                              <option value="">AL</option>
                              <option value="">AK</option>
                              <option value="">AZ</option>
                              <option value="">AR</option>
                              <option value="">CA</option>
                              <option value="">CO</option>
                              <option value="">CT</option>
                              <option value="">DE</option>
                              <option value="">FL</option>
                              <option value="">GA</option>
                              <option value="">HI</option>
                              <option value="">ID</option>
                              <option value="">IL</option>
                              <option value="">IN</option>
                              <option value="">IA</option>
                              <option value="">KS</option>
                              <option value="">KY</option>
                              <option value="">LA</option>
                              <option value="">ME</option>
                              <option value="">MD</option>
                              <option value="">MA</option>
                              <option value="">MI</option>
                              <option value="">MN</option>
                              <option value="">MS</option>
                              <option value="">MO</option>
                              <option value="">MT</option>
                              <option value="">NE</option>
                              <option value="">NV</option>
                              <option value="">NH</option>
                              <option value="">NJ</option>
                              <option value="">NM</option>
                              <option value="">NY</option>
                              <option value="">NC</option>
                              <option value="">ND</option>
                              <option value="">OH</option>
                              <option value="">OK</option>
                              <option value="">OR</option>
                              <option value="">PA</option>
                              <option value="">RI</option>
                              <option value="">SC</option>
                              <option value="">SD</option>
                              <option value="">TN</option>
                              <option value="">TX</option>
                              <option value="">UT</option>
                              <option value="">VT</option>
                              <option value="">VA</option>
                              <option value="">WA</option>
                              <option value="">WV</option>
                              <option value="">WI</option>
                              <option value="">WY</option>
                            </select>
                          </div>
                      </div>
                      <!-- Modal footer has enter btn -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Purchase</button>
                      </div>

                  </div>
              </div>
          </div>
        </div>
        </div>

      <footer>
        <p>&copy; Atlas Corporation 2020</p>
      </footer>
    </body>
</html>