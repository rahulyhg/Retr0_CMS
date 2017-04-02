<html>
<head>
    <meta charset="utf-8">
    <title>Ado: Bienvenidos a Ado</title>
    <link rel="stylesheet" type="text/css" href="web/css/animate.css">
    <link rel="stylesheet" type="text/css" href="web/css/alerts.css">
    <link type="text/css" href="web/css/style.css" rel="stylesheet">
    <link type="text/css" href="web/css/frontpage.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="/styles/css/alerts.css">   
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="web/js/materialize.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal').modal();
            $('.joinNow').click(function() {
                $('#registerModal').modal('open');
            });
            $('.signIn').click(function() {
                $('#loginModal').modal('open');
            });
            $('.loginButton').click(function() {
                $('#loginForm').submit();
            });
        });
    </script>
</head>
<body>
    <div id="ack"></div>
    <div id="front-header" class="z-depth-3">
        <div class="container_24">
            <div class="logo"></div>
            <div class="onlineBox">
                <b>20</b> Ado en ligne
            </div>
            <div style="">
                <ul class="header-menu">
                    <li>
                        <a class="dropdown-button" data-beloworigin="true" data-activates="profile">Me<i class="material-icons iconRight">keyboard_arrow_down</i></a>
                    </li>
                    <ul id="profile" class="dropdown-content">
                        <li class="active"><a href="#!">Sonay</a></li>
                        <li><a href="#!">My Profile</a></li>
                        <li><a href="#!">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="">Sign Out</a></li>
                    </ul>
                    <li>
                        <a class="dropdown-button" data-beloworigin="true" data-activates="community">Community <i class="material-icons iconRight">keyboard_arrow_down</i></a>
                    </li>

                    <ul id="community" class="dropdown-content">
                        <li><a href="#!">Community</a></li>
                        <li><a href="#!">News</a></li>
                        <li><a href="#!">Staffs</a></li>
                        <li><a href="">Hall of Fame</a></li>
                    </ul>
                    <li>
                        <a class="dropdown-button" data-beloworigin="true" data-activates="shop">Habbo-Shop <i class="material-icons iconRight">keyboard_arrow_down</i></a>
                    </li>
                    <ul id="shop" class="dropdown-content">
                        <li><a href="#!">Credits</a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
    <div id="front-header-content">
        <div class="container_24">
            <div class="grid_12">
                <div class="left">
                    <div id="avatar">
                    </div>
                    <div class="infome">
                        <div id="mebadge">
                            <div class="badge">a</div>
                            <div class="badge"></div>
                            <div class="badge"></div>
                            <div class="badge"></div>
                            <div class="badge"></div>
                        </div>
                        <p>Fix0r</p><br>
                        <p>Je suis actuellement en développement</p>
                        <p>
                            <li>
                               <div class="icon credits"></div><b>100</b> crédits
                            </li>
                            <li>
                                <div class="icon diament"></div><b>100</b> diament
                            </li>
                            <li>
                                <div class="icon jetons"></div><b>100</b> jetons
                            </li>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container_24">
        <h4 class="light">Actualité</h4>
        <div class="grid_8">
            <div class="card animated fadeInUp 5s">
                <div class="card-image waves-effect waves-block waves-light" style="background:url('http://habbo-ressource.eu/act/web_promo_023.png') center right;height:180px;"></div>
                <div class="card-content" style="height:150px;padding-top:0;padding-left:15px;">
                    <br>
                    <span class="card-title activator grey-text text-darken-4">Lorem ipsum dolor si</span>
                    <br><br>
                    <p><a href="#!">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea </a></p>
                    </div>
                    <div class="card-action" style="height:55px;">
                        <a href="#" class="right">Lire +</a>
                    </div>
                </div>
            </div>
                    <div class="grid_8">
            <div class="card animated fadeInUp 5s">
                <div class="card-image waves-effect waves-block waves-light" style="background:url('http://habbo-ressource.eu/act/web_promo_023.png') center right;height:180px;"></div>
                <div class="card-content" style="height:150px;padding-top:0;padding-left:15px;">
                    <br>
                    <span class="card-title activator grey-text text-darken-4">Lorem ipsum dolor si</span>
                    <br><br>
                    <p><a href="#!">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea </a></p>
                    </div>
                    <div class="card-action" style="height:55px;">
                        <a href="#" class="right">Lire +</a>
                    </div>
                </div>
            </div>
                    <div class="grid_8">
            <div class="card animated fadeInUp 5s">
                <div class="card-image waves-effect waves-block waves-light" style="background:url('http://habbo-ressource.eu/act/web_promo_023.png') center right;height:180px;"></div>
                <div class="card-content" style="height:150px;padding-top:0;padding-left:15px;">
                    <br>
                    <span class="card-title activator grey-text text-darken-4">Lorem ipsum dolor si</span>
                    <br><br>
                    <p><a href="#!">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea </a></p>
                    </div>
                    <div class="card-action" style="height:55px;">
                        <a href="#" class="right">Lire +</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>          

</body>
</html>


