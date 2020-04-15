<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Atlas Corporation</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">

  <script type="text/javascript" src="javascript/index.js"></script>
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
          <li class="nav-item active">
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
      </nav>  
    </div>

    <nav>
      <!-- Main Page Vertical Navigation -->
      <ul class=" nav flex-column main_page_vertical_nav">
        <li class="nav-item">
          <a class="nav-link" href="#welcome_logo_id">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#company_description">Mission</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#mission_statement">Latest News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#company_news">Testimonials</a>
        </li>
      </ul>
    </nav>

    <div class="row">
      <!-- Company-Logo -->
      <div class="welcome_logo top_row" id="welcome_logo_id">
          <img src="images/Company-Logo.png" alt="Atlas Corporation" title="Atlas Corporation">
      </div>
    </div>

    <!-- Brief Company Description -->
    <div class="row non_top_row" id="company_description">
      <div class="col-md-12">
        <p><b>Atlas Corporation</b> has been servicing the United States Tech Sector for the past 37 years. Here at Atlas we pride ourselves on being on the bleeding edge of innovation by constantly challenging our family of employees to simply be the best. We look for those who have never lost the imaginitive spark that aspires young children to explore. Here at Atlas we are simply experts with the curiosity of a child and the brain of a scientist. Combine all of this and what do you get? Perfection.</p>
      </div>
    </div>


    <!-- Company Mission Statement -->
    <div class="row non_top_row" id="mission_statement">
      <div class="col-md-12">
        <div class="mission_statement_background">
          <p class="mission_title">Mission</p>

          <p class="mission_statement"></p>
        </div>
       </div>
    </div>


    <section id="company_latest_news_section">
      <!-- Company Latest News -->
      <div class="row non_top_row" id="company_news">
        <!-- Section Header -->
        <h4 class="jumbotron">Latest News</h4>
        <!-- Section Articles -->
        <div class="col news_block">
          <img src="images/article_1.jpg" class="article_picture" alt="Blockchain" title="Blockchain">
          <p class="article_brief_explanation">See how Blockchain is advancing our cause within the sector.</p>
          <a href="https://business.financialpost.com/small-cap-investing/hive-blockchain-stock-has-momentum-influential-backers">Read More</a>
        </div>
        <div class="col news_block">
          <img src="images/article_2.png" class="article_picture" alt="Employee Benefits" title="Employee Benefits">
          <p class="article_brief_explanation">See how Altas takes our commitment to employees seriously.</p>
          <a href="https://business.financialpost.com/technology/new-hackdiversity-documentary-wants-the-tech-sector-to-start-taking-inclusivity-seriously">Read More</a>
        </div>
        <div class="col news_block">
          <img src="images/article_3.jpg" class="article_picture" alt="Investing" title="Investing">
          <p class="article_brief_explanation">See why backing tech companies like Atlas benefits both you and us in a big way.</p>
          <a href="https://www.investopedia.com/articles/stocks/10/primer-on-the-tech-industry.asp">Read More</a>
        </div>
        <div class="col news_block">
          <img src="images/article_4.jpg" class="article_picture" alt="Employee Volunteering" title="Volunteering">
          <p class="article_brief_explanation">Here at Atlas we have innovative initiatives to give back to everyone aorund us.</p>
          <a href="https://builtin.com/articles/most-charitable-companies">Read More</a>
        </div>
      </div>     
    </section>
 

    <section id="company_testimonials_section">
      <!-- Testimonials-->
      <div class="row non_top_row" id="company_testimonials">
        <!-- Section Header -->
        <h4 class="jumbotron">Testimonials</h4>
      </div>

      <!-- Testimonial Section Row 1 -->
      <div class="row non_top_row">
        <div class="col testimonial">
          <video class="testimonial_video" controls>
            <source src="media/apple_testimonial.mp4" type="video/mp4">
          </video>
          <p class="testimonial_description">"The Apple Watch would not have been possible without Atlas Corporation's help." - Jony Ives</p>
        </div>

        <div class="col testimonial">
          <video class="testimonial_video" controls>
            <source src="media/microsoft_testimonial.mp4" type="video/mp4">
          </video>
          <p class="testimonial_description">"The Microsoft Hololens would not have been possible without Atlas Corporation's help." - Microsoft Rep</p>
        </div>      
      </div>

      <!-- Testimonial Section Row 2 -->
      <div class="row non_top_row">
        <div class="col testimonial">
          <video class="testimonial_video" controls>
            <source src="media/google_testimonial.mp4" type="video/mp4">
          </video>
          <p class="testimonial_description">"Google Stadia was brough to you by a close partnership between Google and Atlas." - Sundar Pichai</p>
        </div>

        <div class="col testimonial">
          <video class="testimonial_video" controls>
            <source src="media/tesla_testimonial.mp4" type="video/mp4">
          </video>
          <p class="testimonial_description">"We could not have unveiled the Model Y in time without the expertise of Atlas Corporation." - Elon Musk</p>
        </div>      
      </div>
    </section>
  </div>

<footer>
    <p>&copy; Atlas Corporation 2020</p>
</footer>
</body>
</html>