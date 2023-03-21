<?php $xml = simplexml_load_file('article.xml');

// Accéder aux éléments XML
$titre = $xml->livre->titre;
$auteur = $xml->livre->auteur;

// Afficher les éléments sur la page 
echo "Le titre du livre est : $titre";
echo "L'auteur du livre est : $auteur";

?>