<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
include("exemple15.2.php");
$idcom  = connexobjet("magasin", "myparam");
$result = $idcom->query("SELECT c.id_comm, c.date, cl.nom, cl.prenom, c.montant 
                         FROM commande c 
                         JOIN client cl ON c.id_client = cl.idclient");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des ventes</title>
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
            <h3>Liste des ventes</h3>
            <a href="vente.php" class="btn">Ajouter une vente</a>
        </div>
        <table>
            <tr><th>ID</th><th>Date</th><th>Client</th><th>Montant (FCFA)</th></tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_comm'] ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['nom'].' '.$row['prenom'] ?></td>
                <td><?= number_format($row['montant'], 0, '.', ' ').' FCFA' ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="accueil.php" class="btn">Quitter</a>
    </div>
</div>

</body>
</html>
