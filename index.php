<?php $xml = simplexml_load_file('http://www.ouest-france.fr/rss-en-continu.xml');
var_dump($xml);
// Accéder aux éléments XML
// $titre = $xml->channel->title;
// // $auteur = $xml->livre->auteur;

// // Récupérer les éléments sur la page 
// echo "Le titre du livre est : $titre";
// echo "L'auteur du livre est : $auteur";

# Récupérer tous les éléments d'un item
// foreach ($xml->channel->item as $item) {
//     $title = $item->title;
//     echo $title . "<br>";
// }

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
    <header>
        <nav>
          
        </nav>
    </header>
</body>
</html>