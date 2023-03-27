<?php 
$categories = ['Insolite','Politique','Sport','Gastronomie','Culture','Cinéma','Musique','High-tech'];
// Récupérer les valeurs stockées dans les cookies
if(isset($_COOKIE['favorites'])){
    $valeurCookie = json_decode($_COOKIE['favorites'], true);

    // Tableau associatif qui lie les thèmes aux URLs des flux RSS
    $urls = array(
        'Insolites' => 'https://www.lepoint.fr/insolite/rss.xml',
        'Politique' => 'http://www.lepoint.fr/politique/rss.xml',
        'Sports' => 'http://www.lepoint.fr/sport/rss.xml',
        'Gastronomie' => 'http://www.lepoint.fr/gastronomie/rss.xml',
        'Culture' => 'http://www.lepoint.fr/culture/rss.xml',
        'Cinéma' => 'http://www.lepoint.fr/cinema/rss.xml',
        'Musique' => 'http://www.lepoint.fr/musique/rss.xml',
        'Planète Appli' => 'http://www.lepoint.fr/high-tech-internet/planete-appli/rss.xml'
    );

    // Afficher les flux RSS en fonction de chaque valeur stockée dans les cookies
    $articles = array();
    if (is_array($valeurCookie)) {
        foreach($valeurCookie as $theme) {
            if(array_key_exists($theme, $urls)) {
                $xml = simplexml_load_file($urls[$theme]);
                $category = (string) $xml->channel->category;
                foreach($xml->channel->item as $item) {
                    $title = (string) $item->title;
                    $description = (string) $item->description;
                    $image = '';
                    $pubDate = '';
                    if(isset($item->enclosure)) {
                        $image = (string) $item->enclosure['url'];
                    } elseif(isset($item->image)) {
                        $image = (string) $item->image->url;
                    }
                    if(isset($item->pubDate)) {
                        $pubDate = (string) $item->pubDate;
                    }
                    $articles[] = array('title' => $title, 'description' => $description, 'image' => $image, 'pubDate' => $pubDate, 'category' => $category);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregateur</title>
    <link rel="stylesheet" href="./assets/css/style_favorites.css">
    <link rel="stylesheet" href="./assets/mediaqueries/mediaqueries.css">
</head>
<body>
    <header>
        <nav class="web-nav" id="web-nav">
            <a id="logo" href="./index.php"><img src="./assets/images/logo.png" alt="FluXML Logo" class="logo"></a>
            <div class="nav-section">
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
                        <i class="fa-regular fa-heart" id="<?= $categories[$i]?>"></i>
                        </div>
                    <?php } ?>
                </div>
        </nav>
    </header>

    <section class="web-container">
        <main>
            <section class="container">
                <?php 
                    // Afficher les titres et les descriptions des articles
                    echo '<h2>'.$category.'</h2>';
                    foreach($articles as $article) {
                        echo '
                                <div class="article">
                                    <img src="'.$article['image'].'" class="article-img">
                                    <div class="article-info">
                                        <div class="article-top">
                                            <h3 class="article-title">'.$article['title'].'</h2>
                                            <h4 class="article-desc">'.$article['description'].'</p>
                                        </div>
                                        <h5 class="article-date">'.$article['pubDate'].'">
                                    </div>
                                </div>
                            ';
                } ?>
            </section>
        </main>
        <?php include dirname(__FILE__) . "/footer.php" ?>
    </section>
    <script src="./assets/js/script_favorites.js"></script>
</body>
</html>