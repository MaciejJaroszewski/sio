<?php

    $db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "pp34268_sio";
	$db_table = "uzytkownicy";

    $email = $_POST['email'];
    $password = $_POST['password'];

    try {

		$dbh = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
   		$stmt = $dbh->prepare("SELECT `email`,`pass` from $db_table WHERE 'email'=:email AND 'pass'=:pass");

   		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
    	
    	$stmt->bindParam(':pass', $password, PDO::PARAM_STR);

   		$stmt->execute();

   		$result = array();

   		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

   		if ($result) {
   			echo "zalogowano";
   		} else {
   			echo "Spróbuj ponownie";
   		}
   		

   	}	catch (PDOException $e)
	    {
	    	echo $e->getMessage();
	    }



?>