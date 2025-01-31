<?php
    $base_url=Flight::get("flight.base_url");
    if(isset($error)) {
        if($error==0){$message="Aucun utilisateur";}
        if($error==1){$message="Mauvais mot de passe";}
    }else{$message="";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page?></title>
</head>
<body>
    <?php include('header.php');?>
        <?=$message?>
        <?php include($page.'.php');?>
    <?php include('footer.php');?>
</body>
</html>