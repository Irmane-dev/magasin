<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="style.css">
    <title>Lecture de la table article</title>
    <style type="text/css">
        table {border-style:double; border-width:3px; border-color:black; background-color:lightblue;}
    </style>
</head>
<body>
<?php
include("exemple15.2.php");
$idcom = connexobjet("essaiBDD", "myparam");

// Insertion si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $design    = $idcom->real_escape_string($_POST['design']);
    $prix      = $_POST['prix'];
    $categorie = $idcom->real_escape_string($_POST['categorie']);
    $id_article = $idcom->real_escape_string($_POST['id_article']);

    $insert = "INSERT INTO article (id_article, design, prix, categorie) VALUES ('$id_article', '$design', '$prix', '$categorie')";
    $idcom->query($insert);
    $id_article = $idcom->real_escape_string($_POST['id_article']);


}

// Lecture et affichage
$requete = "SELECT * FROM article";
$result  = $idcom->query($requete);

if (!$result) {
    echo "Lecture impossible";
} else {
    $nbart = $result->num_rows;
    
    echo "<h3>Tous nos articles par catégorie</h3>";
    echo "<h4>Il y a $nbart articles en magasin</h4>";
    echo "<table border=\"1\">";
    echo" <button onclick=\"window.location.href='formulaire.php'\">Ajouter un article</button><br><br>";
    echo "<tr><th>Code article</th><th>Désignation</th><th>Prix</th><th>Catégorie</th></tr>";
    while ($ligne = $result->fetch_array(MYSQLI_NUM)) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td> $valeur </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

$result->free();
$idcom->close();
?>
</body>
</html>