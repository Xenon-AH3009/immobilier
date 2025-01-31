<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Liste d'attente validation de dépôt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }
        .client-info {
            background-color: white;
            padding: 20px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .accept-btn {
            background-color: green;
            color: white;
        }
        .decline-btn {
            background-color: red;
            color: white;
        }
        .logout-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>Liste d'attente validation de dépôt</h1>
</header>

<div class="container">
    <div class="client-info">
        <h2>Nom du client : <?=$solde['nomClient']?> </h2>
        <p>Dépôt : <?=$solde['montant']?></p>
        <div class="buttons">
            <button class="accept-btn">Accepter</button>
            <button class="decline-btn">Décliner</button>
        </div>
    </div>
</div>

<button class="logout-btn">Déconnexion</button>

</body>
</html>
