<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Glegoo" rel="stylesheet">
    <link href="View/style.css" rel="stylesheet" type="text/css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid #fff;
        }

        header a:last-child {
            margin-right: 0; /* Supprime la marge à droite du dernier lien */
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    //session_start();

    // afficher le contenu du header en fonction de la connexion
    echo '<header>';
    echo '<a href="index.php"><h1>Forum</h1></a>';
    echo '<div>';

    if (isset($_SESSION['user'])) {
        // utilisateur connecté
        echo 'Bienvenue ' . $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'] . ' | <a href="index.php?ctrl=User&action=logout">Déconnexion</a>';
    } else {
        // utilisateur non connecté
        echo '<a href="index.php?ctrl=User&action=login">Connexion</a>';
        echo '<a href="index.php?ctrl=User&action=create">Créer un compte</a>';
    }

    echo '</div>';
    echo '</header>';
    ?>