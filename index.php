<!-- <?php $xml = simplexml_load_file('http://www.ouest-france.fr/rss-en-continu.xml'); 
// var_dump($xml);
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

?>-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregateur</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/mediaqueries/mediaqueries.css">
</head>
<body>
    <header>
    <a id="logo" href=""><img src="./assets/images/logo.png" alt="FluXML Logo" class="logo"></a>
        <nav class="web-nav">
            <div class="nav-section">
                <a href="" class="nav-item"><img src="./assets/images/searchnormal.png" alt="Rechercher" class="nav-icon"></a>
                <a href="" class="nav-item" id="moon"><img src="./assets/images/moon.png" alt="Mode" class="nav-icon" id="moon-icon"></a>
                <a href="" class="nav-item"><img src="./assets/images/heart.png" alt="Rechercher" class="nav-icon"></a>
                <a href="" class="nav-item"><img src="./assets/images/infocircle.png" alt="Rechercher" class="nav-icon"></a>
            </div>
        </nav>

        <nav class="category-nav">
            <div class="category-hr">
                </div>
                <div class="categories">
                    <!-- boucle à faire en php ici -->
                    <h2>Insolite</h2>
                <h2>Politique</h2>
                <h2>Sport</h2>
                <h2>Gastronomie</h2>
                <h2>Culture</h2>
                <h2>Cinéma</h2>
                <h2>Musique</h2>
                <h2>High-tech</h2>
            </div>
        </nav>
    </header>

    <section class="web-container">
        <main>
        </main>

        <footer>
        </footer>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>