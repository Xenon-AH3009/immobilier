<?php
    $error="";
    if(isset($_GET['error']) && $_GET['error']==0){$error="Account not found";}
    if(isset($_GET['error']) && $_GET['error']==1){$error="Incorrect password";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/admin/logsign.css">
</head>
<body>
</html>
<div class="container">
    <div class="lsl">
        <h2>Connexion Espace Membre</h2>
        <form action="/traitement-loginAdmin" method="post">
            <div><input type="text" placeholder="Nom" required="" name="nom" value="admin"></div>
            <div><input type="password" placeholder="Mot de passe" required="" name="pwd" value="admin"></div>
            <div><input type="submit" value="Se connecter"></div>
        </form>
    </div>
    <div class="lsr">
        <div>
            <h2>LoginAdmin</h2>
            <p></p>
        </div>
    </div>
</div>