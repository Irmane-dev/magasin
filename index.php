<?php
session_start();
include("exemple15.2.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idcom    = connexobjet("magasin", "myparam");
    $login    = $idcom->real_escape_string($_POST['login']);
    $password = $_POST['password'];

    $requete = "SELECT * FROM users WHERE login='$login'";
    $result  = $idcom->query($requete);

    if ($result->num_rows === 0) {
        $erreur = "Utilisateur introuvable.";
    } else {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['login'];
            header("Location: accueil.php");
            exit();
        } else {
            $erreur = "Mot de passe incorrect.";
        }
    }
    $idcom->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <img src="./img/logo_uac.jpg" alt="Logo UAC">
    <h2>Ma Plateforme ENEAM</h2>
    <img src="./img/logo_eneam.jpg" alt="Logo ENEAM">
</div>

<div class="content">
    <h2 style="text-align:center; background:none; color:#2e7d32; margin-bottom:20px;">Connexion</h2>

    <?php if (isset($erreur)) echo "<p class='msg-error' style='text-align:center;'>$erreur</p>"; ?>

    <form method="POST">
        <label>Login :</label>
        <input type="text" name="login" required>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
    <p style="text-align:center; margin-top:10px;">
        <a href="register.php">Pas encore de compte ? S'inscrire</a>
    </p>
</div>

</body>
</html>
