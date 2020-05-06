<?php  
	try
	{
		//Include the Data Base Config
		include 'config.inc.php';

		//Connect to data base
		$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
	
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

		$queryString = "DELETE FROM session WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";

		$result = $pdo->query($queryString);

		$pdo = null;
	}
	catch(PDOException $e)
	{
		header( "Location: index.php" );
		exit;
	}

	header( "Location: cart.php" );
	exit;
?>