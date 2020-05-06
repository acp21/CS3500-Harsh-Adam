<?php 
	//Include Data Base Config
	include 'config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Atlas Corporation</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/user_page.css">

</head>

<body>

    <!--   Main Bootstrap Container -->
    <div class="container-fluid">

        <!-- Nav Bar Container -->
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

        <?php  
			try
			{
				$m_FirstName = '';
				$m_LastName = '';

				$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);

				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//Figure out if a user just registered the account or user is attempting log in
				if(isset($_POST['user_password_reentry']))
				{
					//User is registering and logging in
					$name = explode(" ", $_POST['full_name']);
					$userName = $_POST['user_name'];
					$email = $_POST['user_email'];
					$password = $_POST['user_password'];

					$query = "INSERT INTO users (FirstName, LastName, Username, Email, Password) VALUES ('" . $name[0] . "', '" . $name[1] . "', '" . $userName . "', '" . $email . "', '" . $password . "')";
					$pdo->query($query);

					$m_FirstName = $name[0];
					$m_LastName = $name[1];

				}
				else if(isset($_POST['user_name']))
				{
					$userName = $_POST['user_name'];
					$password = $_POST['user_password'];

					$query = "SELECT Password FROM users WHERE Username = '" . $userName . "'";

					$result = $pdo->query($query)->fetch();

					if(isset($result['Password']))
					{
						$retPassword = $result['Password'];

						if(strcmp($password, $retPassword) == 0)
						{
							$query = "SELECT FirstName, LastName FROM users where Username = '" . $userName . "'";
							$result = $pdo->query($query)->fetch();

							$m_FirstName = $result['FirstName'];
							$m_LastName = $result['LastName'];
						}
						else
						{
							$m_FirstName = null;
							$m_LastName = null;
						}
					}
					else
					{
						$m_FirstName = null;
						$m_LastName = null;
					}

				}
				else
				{
					//Unknown invoker
					$m_FirstName = null;
					$m_LastName = null;
				}

				$pdo = null;

	    		if(isset($m_FirstName) && isset($m_LastName))
	    		{
	    			//Authorized user
					echo "<div class='row'>";
					echo "	<!-- Left Side Bar Content -->";
					echo "    <div class='col-md-3 side_bar'>";
					echo "    	<div class='row user_icon'>";
					echo "			<img src='images/UserIcon.jpeg' alt='User' title='User'>";
					echo "    	</div>";
					echo "    	<!-- Company Logo -->";
					echo "    	<div class='row company_logo'>";
					echo "			<img src='images/Company-Logo.png' alt='Atlas Corporation' title='Atlas Corporation'>";
					echo "    	</div>";
					echo "    	<!-- Possibility of adding some type of web api to display here -->";
					echo "    </div>";
					echo "	<!--     Main Content -->";
					echo "    <div class='col-md-9 main_content'>";
					echo "    	<div class='row welcome'>";
					echo "    		<h2 class='jumbotron welcome_phrase'>Hello, $m_FirstName $m_LastName!</h4>";
					echo "    	</div>";
					echo "    	<div class='row warning'>";
					echo "    		<h4 class='jumbotron warning_phrase'>At Atlas Corporation we urge you and our employees to stay safe from COVID-19 with whatever means necessasry</h2>";
					echo "    	</div>";
					echo "		<div class='row title'>		";
					echo "    		<h4 class='jumbotron title_name'>Products</h2>";
					echo "    	</div>";
					echo "		<div class='row products'>";
					echo "			<div class='col-md-3 product'>";
					echo "				<div class='card'>";
					echo "				  <div class='card-body'>";
					echo "				    <h5 class='card-title'>Pro<br>Book</h5>";
					echo "				    <h6 class='card-subtitle mb-2 text-muted'>Laptop<h6>";
					echo "				    <a href='product.php?productID=1' class='card-link'>Learn More</a>";
					echo "				  </div> ";
					echo "				</div>";
					echo "			</div>";
					echo "			<div class='col-md-3 product'>";
					echo "				<div class='card'>";
					echo "				  <div class='card-body'>";
					echo "				    <h5 class='card-title'>Pro<br>Watch</h5>";
					echo "				    <h6 class='card-subtitle mb-2 text-muted'>Watch<h6>";
					echo "				    <a href='product.php?productID=2' class='card-link'>Learn More</a>";
					echo "				  </div> ";
					echo "				</div>";
					echo "			</div>";
					echo "			<div class='col-md-3 product'>";
					echo "				<div class='card'>";
					echo "				  <div class='card-body'>";
					echo "				    <h5 class='card-title'>Pro<br>Phone</h5>";
					echo "				    <h6 class='card-subtitle mb-2 text-muted'>Phone<h6>";
					echo "				    <a href='catalog.php#pro_phone' class='card-link'>Learn More</a>";
					echo "				  </div> ";
					echo "				</div>";
					echo "			</div>";
					echo "			<div class='col-md-3 product'>";
					echo "				<div class='card'>";
					echo "				  <div class='card-body'>";
					echo "				    <h5 class='card-title'>Pro<br>Monitor</h5>";
					echo "				    <h6 class='card-subtitle mb-2 text-muted'>Monitor<h6>";
					echo "				    <a href='catalog.php#pro_monitor' class='card-link'>Learn More</a>";
					echo "				  </div> ";
					echo "				</div>";
					echo "			</div>";
					echo "    	</div>";
					echo "    </div>";
					echo "</div>";
	    		}
	    		else
	    		{
	    			//Unauthorized user
	    			echo "<h1 class='jumbotron unauthorized_user'>Unauthorized User</h1>";
	    		}
			}
			catch (PDOException $e)
			{
				//Unable to Connect to Data Base
    			echo "<h1 class='jumbotron unauthorized_user'>Unable to Authenticate</h1>";
			}
    	?>
    </div>
</body>

</html>