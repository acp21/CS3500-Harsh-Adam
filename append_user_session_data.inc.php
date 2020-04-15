<?php  
	try 
	{
		//Only query the data base if the get is set
		if(isset($_GET['cart']))
		{
			$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
	
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

			$queryString = "";

			//Figure out which query string to build
			switch($_GET['cart'])
			{
				case "1":
					$queryString = "UPDATE session SET ProBook = 1 WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";
	        		echo '<script type="text/javascript">alert("Thank you for adding the ' . "ProBook" . ' to your cart.");</script>';
					break;
				case "2":
					$queryString = "UPDATE session SET ProWatch = 1 WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";
	        		echo '<script type="text/javascript">alert("Thank you for adding the ' . "ProWatch" . ' to your cart.");</script>';
					break;
				case "3":
					$queryString = "UPDATE session SET ProPhone = 1 WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";
					echo '<script type="text/javascript">alert("Thank you for adding the ' . "ProPhone" . ' to your cart.");</script>';
					break;
				case "4":
					$queryString = "UPDATE session SET ProMonitor = 1 WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";
					echo '<script type="text/javascript">alert("Thank you for adding the ' . "ProMonitor" . ' to your cart.");</script>';
					break;
			}

			$pdo->query($queryString);

			$pdo = null;	
		}

	} 
	catch (PDOException $e) 
	{
		die();	
	}
	

?>