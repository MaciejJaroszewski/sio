<?php
    session_start();
    
    if(!isset($_SESSION['logged']))
    {
        header ('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html ng-app="app">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>SIO Gmina - Panel Administracyjny</title>
     
    <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />
     
    <!-- include material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="libs/css/custom.css">
    
    
	</head>
<body>
   


    <div class="row main-row">  <!-- main row -->

    <!-- nav header -->
        <nav>
            <div class="nav-wrapper teal lighten-1">
                <a href="#" class="brand-logo hide-on-small-only reload">SIO Gmina</a>
                <ul class="right">
<!--                     <li><a class="reload" href="#">Witaj <i class="tiny material-icons right">perm_identity</i></a></li> -->
                    <li><a class="reload" href="logout.php">Wyloguj <i class="tiny material-icons right">input</i></a></li>
                </ul>
            </div>
        </nav>
    
	

<!-- end of nav header -->
        <!-- aside -->
        <div class="col s12 m3 l2 grey darken-1 aside center-align">
            <div class="row">
                <a href="#/info-list" class="waves-effect waves-light btn-large reload activation-button">
                    Komunikaty<i class="material-icons left">send</i> 
                </a>
            </div>
            <div class="row">
                <a href="#/users" class="waves-effect waves-light btn-large reload activation-button">
                    Użytkownicy<i class="material-icons left">contacts</i>
                </a>
            </div>
            <!-- <div class="row">
                <a href="#" class="waves-effect waves-light btn-large">
                    Panel administratora<i class="material-icons left">contacts</i>
                </a>
            </div> -->
            <div class="row">
                <a href="#/change-pass" class="waves-effect waves-light btn-large reload activation-button">
                    Zmień hasło<i class="material-icons left">lock_outline</i>
                </a>
            </div>
        </div>


        <!-- main content -->
        <div class="col s12 m9 l10 grey lighten-4 main-content">
        
       
        <div class="container">


            <!-- loader container -->
            <div class="loader-container">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>


        <!--     content view   -->
            <div class="view-content">            
                
                <div ng-view></div>

            </div> <!--   end of view content -->
        </div>  <!--   end of main content -->
    </div>    <!-- end of main row -->



<!-- include jquery -->
<script type="text/javascript" src="libs/js/jquery.min.js"></script>

 
<!-- material design js -->
<script src="libs/css/materialize/js/materialize.min.js"></script>

<script src="libs/js/angular.min.js"></script>
<script src="libs/js/angular-route.min.js"></script>

<script src="libs/js/app.js"></script>

<script>

    
    $(document).ready(function(){

        $('.loader-container').hide();

        

        settingProperHeight();

        function settingProperHeight () {

            var innerHeight = $(window).innerHeight();
            var navHeight = $('nav').innerHeight();
            var properHeight = innerHeight - navHeight;

            $(".aside").css("height", properHeight);

            $(".main-content").css("height", properHeight);
        };

        $(window).resize(function () {
            var innerHeight = $(window).innerHeight();
            var navHeight = $('nav').innerHeight();
            var properHeight = innerHeight - navHeight;
            
            if(innerHeight > 450){
                settingProperHeight();
            } else {
                $(".aside").css("height", 450);
                $(".main-content").css("height", 450);
            }
        });

        $('.reload').click(function(){
            $('.view-content').hide().delay(1500).fadeIn(100);
            $('.loader-container').fadeIn('fast').delay(1000).fadeOut(100);
        });
        $('.activation-button').click(function(){
            if($(this).hasClass('disabled')){
                return;
            } else {
                $('.activation-button').removeClass("disabled");
                $(this).addClass("disabled");
            }
        });
    });
    
</script>

</body>
</html>