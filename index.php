<?php $xml = simplexml_load_file('article.xml');

// Accéder aux éléments XML
$titre = $xml->livre->titre;
$auteur = $xml->livre->auteur;

// Afficher les éléments sur la page 
echo "Le titre du livre est : $titre";
echo "L'auteur du livre est : $auteur";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregateur</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/mediaqueries/mediaqueries.css">
    <script src="./assets/js/script.js"></script>
</head>
<body>
    
</body>
</html>