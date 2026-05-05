<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
include("exemple15.2.php");
$idcom  = connexobjet("magasin", "myparam");
$result = $idcom->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
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
            <h3>Liste des utilisateurs</h3>
        </div>
        <table>
            <tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Contact</th><th>Login</th></tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><?= $row['login'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="accueil.php" class="btn">Quitter</a>
    </div>
</div>

</body>
</html>
