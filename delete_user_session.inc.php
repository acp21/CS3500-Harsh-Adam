<?php  
	try
	{
		include 'config.inc.php';

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