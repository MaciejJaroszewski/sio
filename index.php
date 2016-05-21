<?php
	session_start();

	if((isset($_SESSION['logged'])) && ($_SESSION['logged'])==true)
	{
		header ('Location: admin.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>SIO Gmina - logowanie - Panel Administracyjny</title>
     
    <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />
     
    <!-- include material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="libs/css/custom-login.css">
	<!-- custom CSS -->
	
</head>
<body>
	<div class="container">
		<div class="row"> <!-- div sekcji nagłówek -->
			<div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 section card-panel hoverable">
				<div class="card">
					<div class="col s12 m6 l6 card-image">
						<img class="frontImage" src="images/sio.png">
					</div>
					<div class="col s12 m6 l6 card-content">
						<h5 class="light-color right-align">System <br>Informacyjno <br>Ostrzegawczy<br><h6 class="right-align light-color">Beta version</h6></h5><div class="divider"></div><h5 class="logo-title right-align">Gmina</h5>
					</div>
				</div>
<!--
				<div class="divider"></div>
				<div class="center-align"></div> miejsce na zegar!
-->
			</div>

        </div><!-- koniec sekcji nagłówka-->
        
		<div class="row">
			<div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 card-panel hoverable">
				<div class="section">
					<h5 class="center-align light-color">Zaloguj się</h5>
				</div>
				<div class="divider"></div>
				<div class="section">
					<div id="form_container">
						<form class="col s12" method="post" action="log_proccess.php" novalidate>
							<div class="row">
						        <div class="input-field col s12">
						          <input id="user" name="user" type="text" class="validate">
						          <label for="user">User</label>
						        </div>
						        <div class="input-field col s12">
									<input id="password" name="password" type="password" class="validate">
									<label for="password">Hasło</label>
								</div>
							</div>
							<br />
							<div class="center-align">
								<button class="btn waves-effect waves-light col s10 offset-s1 m4 offset-m1" type="submit">Zaloguj
	    							<i class="material-icons right">send</i>
	  							</button>
	  							<br class="hide-on-med-and-up" />
	  							<br class="hide-on-med-and-up" />
	  							<button class="btn waves-effect waves-light col s10 offset-s1 m4 offset-m2" type="reset" name="reset">Resetuj</button>
	  							<br />
	  							<br />
	  							<br />
	  						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div> <!-- koniec div.container -->
	
    
          

<!-- include jquery -->
<script type="text/javascript" src="libs/js/jquery.min.js"></script>

 
<!-- material design js -->
<script src="libs/css/materialize/js/materialize.min.js"></script>



</body>
</html>