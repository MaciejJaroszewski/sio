<?php

	// require_once 'connect.php';

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "pp34268_sio";
	$db_table = "uzytkownicy";


	try {

		$dbh = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
   		$stmt = $dbh->prepare("SELECT `id`,`user`,`email`,`privilege`, `czas` from $db_table");

   		$stmt->execute();

   		$result = array();
   		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

   		echo json_encode($result);
   		

   	}	catch (PDOException $e)
	    {
	    	echo $e->getMessage();
	    }

?>