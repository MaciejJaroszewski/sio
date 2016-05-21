<?php

    session_start();

    if((!isset($_POST['user'])) || (!isset($_POST['password'])))
    {
      header ('Location: index.php');
      exit();
    }
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "pp34268_sio";
    $db_table = "uzytkownicy";

    $user = $_POST['user'];
    $password = $_POST['password'];

    try {

    $dbh = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $stmt = $dbh->prepare("SELECT `user`,`pass` from $db_table WHERE user=:user AND pass=:pass");

      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      
      $stmt->bindParam(':pass', $password, PDO::PARAM_STR);

      $stmt->execute();

      $result = array();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($result) {
        $_SESSION['logged'] = true;
        unset($_SESSION['blad']);
        header('Location: admin.php');
      } else {
        $_SESSION['blad'] = true;
        header('Location: login.php');
      }
      

    } catch (PDOException $e)
      {
        echo $e->getMessage();
      }



?>