<?php

	// require_once 'connect.php';

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "pp34268_sio";
	$db_table = "komunikaty";

	$data = json_decode(file_get_contents("php://input"));

	$user = $data->addBy;

	$rodzaj = $data->msgType;

	$tresc = $data->entry;

	$id = $data->id;

	$dataTime = date('Y-m-d H:i:s');


	try {

		$dbh = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
   		$stmt = $dbh->prepare("UPDATE $db_table SET `USER`=:user, `RODZAJ`=:rodzaj, `TRESC`=:tresc, `DATA`=:dataTime WHERE `id`=:id");

   		$stmt->bindParam(':user', $user, PDO::PARAM_STR);
    	$stmt->bindParam(':rodzaj', $rodzaj, PDO::PARAM_STR);
    	$stmt->bindParam(':tresc', $tresc, PDO::PARAM_STR);
    	$stmt->bindParam(':dataTime', $dataTime, PDO::PARAM_LOB);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);

   		$stmt->execute();   		

   	}	catch (PDOException $e)
	    {
	    	echo $e->getMessage();
	    }

?>