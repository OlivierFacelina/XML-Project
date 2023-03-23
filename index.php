<?php
$categories = ['Insolite','Politique','Sport','Gastronomie','Culture','Cinéma','Musique','High-tech'];
$xml = simplexml_load_file('https://www.lepoint.fr/insolite/rss.xml'); 

$titles = $xml->xpath('//title');
$descriptions = $xml->xpath('//description');
$publishDates = $xml->xpath('//pubDate');
$links = $xml->xpath('//link');
$imgUrl = $xml->xpath('//enclosure/@url');
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
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
                <div class="categories">
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
            <section class="container" id="anim">

                <div class="category-upper">
                    <h2 class="category-title">Insolite</h2>
                    <a href=""><img src="./assets/images/heart.png" alt="" class="add-favourite" id="heart-category"></a>
                </div>
                <hr>

                <section id="articles">
                    <?php 
                        for ($i = 2; $i < 10; $i++) {
                    ?>
                        <div class="article">
                            <a href="<?= $links[$i] ?>, " target="blank"><img src="<?= $imgUrl[$i - 2] ?>" alt="" class="article-img"></a>
                            <div class="article-info">
                                <div class="article-top">
                                    <h3 class="article-title"><?= $titles[$i] ?></h3>
                                    <h4 class="article-desc"><?= $descriptions[$i - 1] ?></h4>
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
    <script
      src="https://kit.fontawesome.com/231b981596.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>