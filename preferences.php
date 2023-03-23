<!-- <?php $xml = simplexml_load_file('https://www.lepoint.fr/insolite/rss.xml'); 
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
        <nav class="web-nav" id="web-nav">
            <a id="logo" href=""><img src="./assets/images/logo.png" alt="FluXML Logo" class="logo"></a>
            <div class="nav-section">
                <a href="" class="nav-item"><img src="./assets/images/searchnormal.png" alt="Rechercher" class="nav-icon" id="search-icon"></a>
                <a href="" class="nav-item" id="moon"><img src="./assets/images/moon.png" alt="Mode" class="nav-icon" id="moon-icon"></a>
                <a href="" class="nav-item" id="heart"><img src="./assets/images/heart.png" alt="Rechercher" class="nav-icon" id="heart-emoji"></a>
                <a class="nav-item" id="animrubrique"><img src="./assets/images/infocircle.png" alt="Rechercher" class="nav-icon" id="infocircle-icon"></a>
            </div>
        </nav>

        <nav class="category-nav" id="menu-deroulant">
            <div class="category-hr">

            </div>
                <div class="categories" id="mask">
                    <?php for ($i = 0; $i < count($categories); $i++) { ?>
                        <div class="title-like">
                        <h2><?= $categories[$i] ?></h2>
                        <i class="fa-regular fa-heart"></i>
                        </div>
                    <?php } ?>
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