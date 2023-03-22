<?php $xml = simplexml_load_file('https://www.lepoint.fr/insolite/rss.xml'); 

$titles = $xml->xpath('//title');
$descriptions = $xml->xpath('//description');
$publishDates = $xml->xpath('//pubDate');
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
</head>
<body>
    <header>
        <nav class="web-nav">
            <a id="logo" href=""><img src="./assets/images/logo.png" alt="FluXML Logo" class="logo"></a>
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
                    <h2 class="category-title">Insolite</h2>
                    <h2 class="category-title">Politique</h2>
                    <h2 class="category-title">Sport</h2>
                    <h2 class="category-title">Gastronomie</h2>
                    <h2 class="category-title">Culture</h2>
                    <h2 class="category-title">Cinéma</h2>
                    <h2 class="category-title">Musique</h2>
                    <h2 class="category-title">High-tech</h2>
            </div>
        </nav>
    </header>

    <section class="web-container">
        <main>
            <section class="container">
                <div class="category-upper">
                    <h2 class="category-title">Insolite</h2>
                    <a href=""><img src="./assets/images/heart.png" alt="" class="add-favourite"></a>
                </div>
                <hr>

                <section id="articles">
                    <?php 
                        for ($i = 0; $i < 8; $i++) {
                    ?>
                        <div class="article">
                            <a href=""><img src="./assets/images/211102182247-biden-asleep-cop26-vpx.jpg" alt="" class="article-img"></a>
                            <div class="article-info">
                                <div class="article-top">
                                    <h3 class="article-title"><?= $titles[$i] ?></h3>
                                    <h4 class="article-desc"><?= $descriptions[$i] ?></h4>
                                </div>
                                <h5 class="article-date"><?= $publishDates[$i] ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                </section>
            </section>
        </main>

        <footer>
        </footer>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>