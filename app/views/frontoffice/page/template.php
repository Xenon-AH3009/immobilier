<?php
    $base_url=Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/style.css">
    <title><?=$page?></title>
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-custom">
        <div class="container-fluid">
            <!-- Logo à gauche -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="..." />
                </a>
            </div>

            <!-- Formulaire de recherche centré -->
            <form class="navbar-form navbar-left" role="search" action="<?= $base_url?>/rechercheDescr" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="criteria"/>
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

            <!-- Menu de navigation à droite -->
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Admin</a></li>
                <li class="dropdown" id="messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                         <span class="glyphicon glyphicon-th-list"></span>
                    </a>
                    <ul class="dropdown-menu" id="messages-dropdown">
                        <!-- Ces options seront manipulées par JavaScript -->
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
        <?php include($page.'.php')?>
    <footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>

        <script>
            // Simuler une session utilisateur active ou non
            var isUserLoggedIn = false; // Change cette valeur pour simuler l'état de connexion de l'utilisateur

            // Fonction pour gérer le menu déroulant en fonction de la session utilisateur
            function updateMessagesMenu() {
                var messagesDropdown = document.getElementById("messages-dropdown");
            
                // Effacer les éléments existants dans le menu
                messagesDropdown.innerHTML = "";
            
                // Ajouter les options en fonction de l'état de connexion
                if (isUserLoggedIn) {
                    // Si l'utilisateur est connecté, afficher uniquement "Se déconnecter"
                    var logoutItem = document.createElement("li");
                    logoutItem.innerHTML = '<a href="#">Se déconnecter</a>';
                    messagesDropdown.appendChild(logoutItem);
                } else {
                    // Si l'utilisateur n'est pas connecté, afficher "Se connecter" et "S\'inscrire"
                    var loginItem = document.createElement("li");
                    loginItem.innerHTML = '<a href="#">Se connecter</a>';
                    messagesDropdown.appendChild(loginItem);
                
                    var signupItem = document.createElement("li");
                    signupItem.innerHTML = '<a href="#">S\'inscrire</a>';
                    messagesDropdown.appendChild(signupItem);
                }
            }
            // Initialiser le menu au chargement de la page
            updateMessagesMenu();
        </script>
    </footer>
</body>
</html>