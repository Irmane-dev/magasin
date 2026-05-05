<?php
include("exemple15.2.php");

$success = "";
$erreur  = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idcom    = connexobjet("magasin", "myparam");
    $nom      = $idcom->real_escape_string($_POST['nom']);
    $prenom   = $idcom->real_escape_string($_POST['prenom']);
    $contact  = $idcom->real_escape_string($_POST['contact']);
    $login    = $idcom->real_escape_string($_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $requete = "INSERT INTO users (nom, prenom, contact, login, password) 
                VALUES ('$nom', '$prenom', '$contact', '$login', '$password')";
    $result  = $idcom->query($requete);

    if (!$result) {
        $erreur = "Erreur : " . $idcom->error;
    } else {
        $success = "Inscription réussie !";
    }
    $idcom->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <img src="./img/logo_uac.jpg" alt="Logo UAC">
    <h2>Ma Plateforme ENEAM</h2>
    <img src="./img/logo_eneam.jpg" alt="Logo ENEAM">
</div>

<div class="content">
    <h2 style="text-align:center; background:none; color:#2e7d32; margin-bottom:20px;">Inscription</h2>

    <?php if ($erreur)  echo "<p class='msg-error' style='text-align:center;'>$erreur</p>"; ?>
    <?php if ($success) echo "<p class='msg-success' style='text-align:center;'>$success <a href='index.php'>Se connecter</a></p>"; ?>

    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" required>

        <label>Contact :</label>
        <input type="text" name="contact" required>

        <label>Login :</label>
        <input type="text" name="login" required>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>

        <button type="submit">S'inscrire</button>
    </form>
    <p style="text-align:center; margin-top:10px;">
        <a href="index.php">Déjà un compte ? Se connecter</a>
    </p>
</div>

</body>
</html>
