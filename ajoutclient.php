<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
include("exemple15.2.php");

$success = "";
$erreur  = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idcom   = connexobjet("magasin", "myparam");
    $nom     = $idcom->real_escape_string($_POST['nom']);
    $prenom  = $idcom->real_escape_string($_POST['prenom']);
    $age     = $_POST['age'];
    $adresse = $idcom->real_escape_string($_POST['adresse']);
    $ville   = $idcom->real_escape_string($_POST['ville']);
    $mail    = $idcom->real_escape_string($_POST['mail']);

    $req = "INSERT INTO client (nom, prenom, age, adresse, ville, mail) 
            VALUES ('$nom', '$prenom', '$age', '$adresse', '$ville', '$mail')";

    if ($idcom->query($req)) {
        $success = "Client ajouté avec succès !";
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
    <title>Ajouter un client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <img src="./img/logo_uac.jpg" alt="Logo UAC">
    <h2>Ma Plateforme ENEAM</h2>
    <img src="./img/logo_eneam.jpg" alt="Logo ENEAM">
</div>

<div class="content">
    <h2 style="text-align:center; background:none; color:#2e7d32; margin-bottom:20px;">Ajouter un client</h2>

    <?php if ($erreur)  echo "<p class='msg-error' style='text-align:center;'>$erreur</p>"; ?>
    <?php if ($success) echo "<p class='msg-success' style='text-align:center;'>$success — <a href='listeclient.php'>Retour à la liste</a></p>"; ?>

    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" required>

        <label>Age :</label>
        <input type="number" name="age" required>

        <label>Adresse :</label>
        <input type="text" name="adresse" required>

        <label>Ville :</label>
        <input type="text" name="ville" required>

        <label>Mail :</label>
        <input type="email" name="mail" required>

        <button type="submit">Enregistrer</button>
    </form>
    <br>
    <a href="accueil.php" class="btn">Quitter</a>
</div>

</body>
</html>
