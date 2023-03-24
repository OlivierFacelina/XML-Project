<?php
$categories = ['Insolite','Politique','Sport','Gastronomie','Culture','Cinéma','Musique','High-tech'];

// Switch case si l'utilisateur a choisi ce cookie alors on lui met ce flux
// if(isset($_COOKIE['favorites'])){
//     $valeurCookie = json_decode($_COOKIE['favorites'], true);
//     if (in_array('Insolite', $valeurCookie)) {
//         // echo 'Tu as choisi le thème : Insolite';
//         $xml = simplexml_load_file('https://www.lepoint.fr/insolite/rss.xml'); 
//     } elseif (in_array('Politique',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/politique/rss.xml'); 
//     } elseif (in_array('Sport',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/sport/rss.xml');
//     } elseif (in_array('Gastronomie',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/gastronomie/rss.xml');
//     } elseif (in_array('Culture',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/culture/rss.xml');
//     } elseif (in_array('Cinéma',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/cinema/rss.xml');
//     } elseif (in_array('Musique',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/musique/rss.xml');
//     } elseif (in_array('High-tech',$valeurCookie)) {
//         $xml = simplexml_load_file('http://www.lepoint.fr/high-tech-internet/planete-appli/rss.xml');
//     } 
// }

// $xml = simplexml_load_file('https://www.lepoint.fr/insolite/rss.xml'); 
$xml = simplexml_load_file('https://www.lepoint.fr/insolite/rss.xml'); 
$categoryName = $xml->xpath('//category');
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
            <a id="logo" href="./index.php"><img src="./assets/images/logo.png" alt="FluXML Logo" class="logo"></a>
            <div class="nav-section">
                <a href="" class="nav-item" id="moon"><img src="./assets/images/moon.png" alt="Mode" class="nav-icon" id="moon-icon"></a>
                <a href="favorites.php" class="nav-item" id="heart"><img src="./assets/images/heart.png" alt="Rechercher" class="nav-icon" id="heart-emoji"></a>
                <a class="nav-item" id="animrubrique"><img src="./assets/images/infocircle.png" alt="Rechercher" class="nav-icon" id="infocircle-icon"></a>
            </div>
        </nav>

        <nav class="category-nav" id="menu-deroulant">
            <div class="category-hr">
            </div>
                <div class="categories" id="mask">
                    <?php for ($i = 0; $i < count($categories); $i++) { ?>
                        <div class="title-like">
                        <h2 class="category-title"><?= $categories[$i] ?></h2>
                        <i class="fa-regular fa-heart" id="<?= $categories[$i]?>"></i>
                        </div>
                    <?php } ?>
                </div>
        </nav>
    </header>

    <section class="web-container">
        <main>
            <section class="container" id="anim">
                <form id="search-form">
                    <div class="search-section">
                        <a href="" class=""><img src="./assets/images/searchnormal.png" alt="Rechercher" id="search-icon" class="search-icon"></a>
                        <input type="text" placeholder="Rechercher..." class="search-input" id="search-input">
                        <select name="category" id="category">
                            <option value="">Toutes catégories</option>
                            <option value="Insolite">Insolite</option>
                            <option value="Politique">Politique</option>
                            <option value="Sport">Sport</option>
                            <option value="Gastronomie">Gastronomie</option>
                            <option value="Culture">Culture</option>
                            <option value="Cinéma">Cinéma</option>
                            <option value="Musique">Musique</option>
                            <option value="High-tech">High-tech</option>
                        </select>
                    </div>
                </form>

                <div class="category-upper">
                    <h1 class="page-title">
                        <?= $categoryName[0] ?>
                    </h1>
                </div>
                <hr>

                <section id="articles">
                    <?php 
                        for ($i = 2; $i < 10; $i++) {
                    ?>
                        <div class="article">
                            <a href="<?= $links[$i] ?> " target="blank"><img src="<?= $imgUrl[$i - 2] ?>" alt="" class="article-img"></a>
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
        <?php include dirname(__FILE__) . "/footer.php" ?>
    </section>
    <script src="assets/js/script.js"></script>
    <script
      src="https://kit.fontawesome.com/231b981596.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>
