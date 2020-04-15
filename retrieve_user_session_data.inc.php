<?php  
	try
	{
		$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$queryString = "SELECT * FROM session WHERE SessionKey = '" . $_COOKIE['PHPSESSID'] . "'";

		$result = $pdo->query($queryString)->fetch();

		if(isset($result['SessionKey']))
		{
			$GLOBALS['g_ProductsInCart'] = array();

			if($result['ProBook'])
			{
				array_push($GLOBALS['g_ProductsInCart'], '1');
			}

			if($result['ProWatch'])
			{
				array_push($GLOBALS['g_ProductsInCart'], '2');
			}

			if($result['ProPhone'])
			{
				array_push($GLOBALS['g_ProductsInCart'], '3');
			}

			if($result['ProMonitor'])
			{
				array_push($GLOBALS['g_ProductsInCart'], '4');
			}
		}
		else
		{
			$GLOBALS['g_ProductsInCart'] = null;
		}

		$pdo = null;
	}
	catch (PDOException $e) 
	{
		die();	
	}
?>