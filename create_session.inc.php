<?php 
	try
	{
		//Start the session
		session_start();
		//Connect to Data Base
		$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
	
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

		//Only create session in data base if the session isn't already there
		$queryString = "SELECT SessionKey FROM session WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";
		$result = $pdo->query($queryString)->fetch();

		if(!isset($result['SessionKey']))
		{
			//Create new session
			$queryString = "INSERT INTO session (SessionKey, ProBook, ProWatch, ProPhone, ProMonitor) VALUES ('" . $_COOKIE['PHPSESSID'] . "', " . "0, 0, 0, 0)";
			$pdo->query($queryString);
		}

		$pdo = null;
	}
	catch(PDOException $e)
	{
		die();
	}
?>