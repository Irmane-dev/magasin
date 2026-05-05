<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
include("exemple15.2.php");

$success = "";
$erreur  = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idcom      = connexobjet("magasin", "myparam");
    $id_article = $idcom->real_escape_string($_POST['id_article']);
    $design     = $idcom->real_escape_string($_POST['design']);
    $prix       = $_POST['prix'];
    $categorie  = $idcom->real_escape_string($_POST['categorie']);

    $req = "INSERT INTO article (id_article, design, prix, categorie) 
            VALUES ('$id_article', '$design', '$prix', '$categorie')";

    if ($idcom->query($req)) {
        $success = "Article ajouté avec succès !";
    } else {
        $erreur = "Erreur : " . $idcom->error;
    }
    $idcom->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <img src="./img/logo_uac.jpg" alt="Logo UAC">
    <h2>Ma Plateforme ENEAM</h2>
    <img src="./img/logo_eneam.jpg" alt="Logo ENEAM">
</div>

<div class="content">
    <h2 style="text-align:center; background:none; color:#2e7d32; margin-bottom:20px;">Ajouter un article</h2>

    <?php if ($erreur)  echo "<p class='msg-error' style='text-align:center;'>$erreur</p>"; ?>
    <?php if ($success) echo "<p class='msg-success' style='text-align:center;'>$success — <a href='listearticle.php'>Retour à la liste</a></p>"; ?>

    <form method="POST">
        <label>Code article :</label>
        <input type="text" name="id_article" required>

        <label>Désignation :</label>
        <input type="text" name="design" required>

        <label>Prix :</label>
        <input type="number" step="0.01" name="prix" required>

        <label>Catégorie :</label>
        <input type="text" name="categorie" required>

        <button type="submit">Enregistrer</button>
    </form>
    <br>
    <a href="accueil.php" class="btn">Quitter</a>
</div>

</body>
</html>
