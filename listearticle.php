<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
include("exemple15.2.php");
$idcom  = connexobjet("magasin", "myparam");
$result = $idcom->query("SELECT * FROM article");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <img src="./img/logo_uac.jpg" alt="Logo UAC">
    <h2>Ma Plateforme ENEAM</h2>
    <img src="./img/logo_eneam.jpg" alt="Logo ENEAM">
</div>

<div class="content">
    <div class="table-container">
        <div class="table-header">
            <h3>Liste des articles</h3>
            <a href="formulaire.php" class="btn">Ajouter un article</a>
        </div>
        <table>
            <tr><th>Code article</th><th>Désignation</th><th>Prix (FCFA)</th><th>Catégorie</th></tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_article'] ?></td>
                <td><?= $row['design'] ?></td>
                <td><?= number_format($row['prix'], 0, '.', ' ').' FCFA' ?></td>
                <td><?= $row['categorie'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="accueil.php" class="btn">Quitter</a>
    </div>
</div>

</body>
</html>
