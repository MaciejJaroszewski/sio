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
    
    <style>
        .nav-wrapper a {
            padding-left: 30px;
        }
        /*.aside, .main-content {
            min-height: 700px;
        }*/
        .aside a {
            height: auto;
            font-size: 13px;
            width: 100%;
        }
        .aside .row {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .main-row {
            margin: 0;
        }
        .sortTitle {
            color: inherit;
        }
        .loader-container {
            padding-top: 20%;
        }


    </style>
    
	</head>
<body>
   


    <div class="row main-row">  <!-- main row -->

    <!-- nav header -->
        <nav>
            <div class="nav-wrapper teal lighten-1">
                <a href="#" class="brand-logo hide-on-small-only reload">SIO Gmina</a>
                <ul class="right">
                    <li><a class="reload" href="#">Witaj ... <i class="tiny material-icons right">perm_identity</i></a></li>
                    <li><a class="reload" href="#">Wyloguj <i class="tiny material-icons right">input</i></a></li>
                </ul>
            </div>
        </nav>
    
	

<!-- end of nav header -->
        <!-- aside -->
        <div class="col s12 m3 l2 grey darken-1 aside center-align">
            <div class="row">
                <a href="#/info-list" class="waves-effect waves-light btn-large reload">
                    Komunikaty<i class="material-icons left">send</i> 
                </a>
            </div>
            <div class="row">
                <a href="#/users" class="waves-effect waves-light btn-large reload">
                    Użytkownicy<i class="material-icons left">contacts</i>
                </a>
            </div>
            <!-- <div class="row">
                <a href="#" class="waves-effect waves-light btn-large">
                    Panel administratora<i class="material-icons left">contacts</i>
                </a>
            </div> -->
            <div class="row">
                <a href="#/change-pass" class="waves-effect waves-light btn-large reload">
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

<!-- fixed action button for adding new notification -->

    <div class="fixed-action-btn hide-on-small-only" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Szybkie wysłanie komunikatu" href="#modal1">
            <i class="large material-icons">mode_edit</i>
        </a>
    </div>

<!-- modal for fixed action button -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Dodaj komunikat</h4>
            <p>
            <!--  modal1 content - form - -->
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Wybierz typ komunikatu</option>
                                <option value="alert">Alert</option>
                                <option value="informacja">Informacja</option>
                            </select>
                            <label>Typ komunikatu</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="wpis" name="wpis" class="materialize-textarea"></textarea>
                            <label for="wpis">Treść komunikatu</label>
                        </div>
                        
                    </div>
                    <button id="fastInfoSend" class="btn waves-effect waves-light" type="send" name="sendNewInfo">Wyślij
                            <i class="material-icons right">send</i>
                    </button>
                    <button class="btn waves-effect waves-light" type="reset" name="restData">Resetuj</button>
                </form>
            </div>

            </p>
        </div>
        <div class="modal-footer">
            <a id="exitModalButton" class="btn-floating btn-large red">
                <i class="large material-icons">not_interested</i>
            </a>
        </div>
    </div>
    
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

        $('.modal-trigger').leanModal();
        $('select').material_select();

        $("#exitModalButton").click(function() {
            $('#modal1').closeModal();
        });

        $('#fastInfoSend').click(function (e){
            e.preventDefault();
            $('#modal1').closeModal();
            Materialize.toast("Dodano komunikat", 5000);
        });

        settingProperHeight();

        function settingProperHeight () {

            var innerHeight = $(window).innerHeight();
            var navHeight = $('nav').innerHeight();
            var properHeight = innerHeight - navHeight;

            $(".aside").css("minHeight", properHeight);

            $(".main-content").css("minHeight", properHeight);
        };

        $(window).resize(function () {
            var innerHeight = $(window).innerHeight();
            var navHeight = $('nav').innerHeight();
            var properHeight = innerHeight - navHeight;
            
            if(innerHeight > 450){
                settingProperHeight();
            } else {
                $(".aside").css("minHeight", 450);
                $(".main-content").css("minHeight", 450);
            }
        });

        $('.reload').click(function(){
            $('.view-content').hide().delay(1500).fadeIn(100);
            $('.loader-container').fadeIn('fast').delay(1000).fadeOut(100);
        });
    });
    
</script>

</body>
</html>