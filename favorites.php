<?php 
// Récupérer les valeurs stockées dans les cookies
if(isset($_COOKIE['favorites'])){
    $valeurCookie = json_decode($_COOKIE['favorites'], true);

    // Tableau associatif qui lie les thèmes aux URLs des flux RSS
    $urls = array(
        'Insolite' => 'https://www.lepoint.fr/insolite/rss.xml',
        'Politique' => 'http://www.lepoint.fr/politique/rss.xml',
        'Sport' => 'http://www.lepoint.fr/sport/rss.xml',
        'Gastronomie' => 'http://www.lepoint.fr/gastronomie/rss.xml',
        'Culture' => 'http://www.lepoint.fr/culture/rss.xml',
        'Cinéma' => 'http://www.lepoint.fr/cinema/rss.xml',
        'Musique' => 'http://www.lepoint.fr/musique/rss.xml',
        'High-tech' => 'http://www.lepoint.fr/high-tech-internet/planete-appli/rss.xml'
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
            <a id="logo" href=""><img src="./assets/images/logo.png" alt="FluXML Logo" class="logo"></a>
            <div class="nav-section">
                <a href="" class="nav-item"><img src="./assets/images/searchnormal.png" alt="Rechercher" class="nav-icon" id="search-icon"></a>
                <a href="" class="nav-item" id="moon"><img src="./assets/images/moon.png" alt="Mode" class="nav-icon" id="moon-icon"></a>
                <a href="" class="nav-item" id="heart"><img src="./assets/images/heart.png" alt="Rechercher" class="nav-icon" id="heart-emoji"></a>
                <a class="nav-item" id="animrubrique"><img src="./assets/images/infocircle.png" alt="Rechercher" class="nav-icon" id="infocircle-icon"></a>
            </div>
        </nav>
    </header>

    <section class="web-container">
        <?php 
    // Afficher les titres et les descriptions des articles
    echo '<h2>'.$category.'</h2>';
    foreach($articles as $article) {
        echo '<div class="image">
                <img src="'.$article['image'].'">
                <div class="text">
                    <h2>'.$article['title'].'</h2>
                    <p>'.$article['description'].'</p>
                    <p>'.$article['pubDate'].'">
                </div>
            </div>';
    } ?>
    </section>
    <script src="./assets/js/script_favorites.js"></script>
</body>
</html>