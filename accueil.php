<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <img src="./img/logo_uac.jpg" alt="Logo UAC">
    <h2>Ma Plateforme ENEAM</h2>
    <img src="./img/logo_eneam.jpg" alt="Logo ENEAM">
</div>

<div class="content" style="text-align:center;">
    <p style="margin: 10px 0 20px 0; font-size:15px;">
        Connecté en tant que : <strong><?= $_SESSION['user'] ?></strong>
    </p>

    <ul>
        <li><a href="listeusers.php">Liste des utilisateurs</a></li>
        <li><a href="listearticle.php">Liste des articles</a></li>
        <li><a href="listeclient.php">Liste des clients</a></li>
        <li><a href="listevente.php">Liste des ventes</a></li>
    </ul>

    <br>
    <a href="vente.php" class="btn">Effectuer une vente</a>
    <a href="logout.php" class="btn">Se déconnecter</a>
</div>

</body>
</html>
