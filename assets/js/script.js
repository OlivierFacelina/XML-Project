// ------------------------------- MODE SOMBRE ------------------------------ //

const moonIcon = document.getElementById('moon-icon');
const searchIcon = document.getElementById('search-icon');
const heartEmoji = document.getElementById('heart-emoji');
const heartCategory = document.getElementById('heart-category');
const infocircleIcon = document.getElementById('infocircle-icon');
const navbar = document.getElementById('web-nav');
const category = document.querySelectorAll("h2.category-title");
console.log(category[0].textContent)
// console.log(moonIcon)

// récupérer la valeur de isDarkMode dans le localStorage
let isDarkMode = localStorage.getItem('isDarkMode') === 'true';

// mettre à jour l'icône en fonction de la valeur de isDarkMode
if (isDarkMode) {
  document.body.classList.add('dark-mode');
  navbar.classList.add('dark-mode');
  moonIcon.setAttribute('src', './assets/images/sunlight.png');
  moonIcon.setAttribute('alt', 'Mode nuit');
  searchIcon.setAttribute('src', './assets/images/searchlight.png');
  heartEmoji.setAttribute('src', './assets/images/heartlight.png');
  heartCategory.setAttribute('src', './assets/images/heartlight.png');
  infocircleIcon.setAttribute('src', './assets/images/infocirclelight.png');
} else {
  document.body.classList.remove('dark-mode');
  navbar.classList.remove('dark-mode');
  moonIcon.setAttribute('src', './assets/images/moon.png');
  moonIcon.setAttribute('alt', 'Mode clair');
}

moonIcon.addEventListener('click', (event) => {
  event.preventDefault();
  if (isDarkMode) {
    document.body.classList.remove('dark-mode');
    navbar.classList.remove('dark-mode');
    moonIcon.setAttribute('src', './assets/images/moon.png');
    moonIcon.setAttribute('alt', 'Mode clair');
    searchIcon.setAttribute('src', './assets/images/searchnormal.png');
    heartEmoji.setAttribute('src', './assets/images/heart.png');
    heartCategory.setAttribute('src', './assets/images/heart.png');
    infocircleIcon.setAttribute('src', './assets/images/infocircle.png');
  } else {
    document.body.classList.add('dark-mode');
    navbar.classList.add('dark-mode');
    moonIcon.setAttribute('src', './assets/images/sunlight.png');
    moonIcon.setAttribute('alt', 'Mode nuit');
    searchIcon.setAttribute('src', './assets/images/searchlight.png');
    heartEmoji.setAttribute('src', './assets/images/heartlight.png');
    heartCategory.setAttribute('src', './assets/images/heartlight.png');
    infocircleIcon.setAttribute('src', './assets/images/infocirclelight.png');
  }

  // mettre à jour la valeur de isDarkMode dans le localStorage
  isDarkMode = !isDarkMode;
  localStorage.setItem('isDarkMode', isDarkMode);
});

// ------------------------------- FAVORIS ------------------------------ //

// Pour ajouter aux favoris, quand tu cliques sur le coeur ça l'ajoute aux favoris
const favorites = document.querySelectorAll('.fa-heart');
const h2 = document.querySelectorAll('h2');
const values = [];
const link = document.getElementById('heart')

favorites.forEach(element => { 
  element.addEventListener('click', () => {
    values.push(element.id);
    // Enregistrement cookies
    // console.log(element.id)
    document.cookie = `favorites=${JSON.stringify(values)};expires=Thu, 01 Jan 2099 00:00:00 UTC;path=/`;
  })
});

// ____________________________________________________________________________________________________________________
//                                         ANIM NAV
// Définir media query
// 680 équivalent à la nav qui passe en haut
var mediaQuery_680px = window.matchMedia('(max-width: 680px)');


const animrubrique = document.getElementById("animrubrique");
let isWhite = true;
const menu_deroulant = document.getElementById("menu-deroulant");
const mask = document.getElementById("mask")
if (!mediaQuery_680px.matches){
  animrubrique.addEventListener('click', event => {
    menu_deroulant.style.width = menu_deroulant.offsetWidth > 15 ? "0vw" : "20vw";
    mask.style.display = mask.offsetWidth > 15 ? "none" : "flex"
    menu_deroulant.style.backdropFilter = menu_deroulant.offsetWidth > 15 ? "none" : "blur(2.5px)"
});}
else {
  animrubrique.addEventListener('click', event => {
    menu_deroulant.style.width = menu_deroulant.offsetWidth > 15 ? "0vw" : "50vw";
    mask.style.display = mask.offsetWidth > 15 ? "none" : "flex"
    menu_deroulant.style.backdropFilter = menu_deroulant.offsetWidth > 15 ? "none" : "blur(2.5px)"
});
}
// ____________________________________________________________________________________________________________________
//                                         SEARCHBAR

const categories = ['Insolite','Politique','Sport','Gastronomie','Culture','Cinéma','Musique','High-tech'];
const searchForm = document.getElementById('search-form');
const searchInput = document.getElementById('search-input');
const categorySelect = document.getElementById('category');

// Flux correspondant à chaque catégorie
const feeds = {
  'Insolite': 'http://www.lepoint.fr/insolite/rss.xml',
  'Politique': 'http://www.lepoint.fr/politique/rss.xml',
  'Sport': 'http://www.lepoint.fr/sport/rss.xml',
  'Gastronomie': 'http://www.lepoint.fr/gastronomie/rss.xml',
  'Culture': 'http://www.lepoint.fr/culture/rss.xml',
  'Cinéma': 'http://www.lepoint.fr/cinema/rss.xml',
  'Musique': 'http://www.lepoint.fr/musique/rss.xml',
  'High-tech': 'http://www.lepoint.fr/high-tech-internet/planete-appli/rss.xml'
};

function searchCategories() {
  // On va récup la valeur de l'input de recherche et la catégorie sélectionnée
  const searchString = searchInput.value.toLowerCase();
  const category = categorySelect.value;

  // On filtre les catégories qui correspondent à la recherche
  let filteredCategories;
  if (category === '') {
    // Si y a rien, filtrer toutes les catégories
    filteredCategories = categories.filter((category) => {
      return category.toLowerCase().includes(searchString);
    });
  } else {
    // Si une catégorie est sélectionnée, filtrer uniquement cette catégorie
    filteredCategories = [category];
  }

  // On obtient les flux correspondant aux catégories filtrées
  const filteredFeeds = filteredCategories.map((category) => {
    return feeds[category];
  });

  // On redirige l'utilisateur vers les flux correspondants
  window.location.href = filteredFeeds.join(',');
}

// Quand on valide, ça envoie les données et ça appelle la fonction définie plus haut
searchForm.addEventListener('submit', (event) => {
  event.preventDefault();
  searchCategories();
});

category.addEventListener('click', (event) => {
  console.log("oui");
  var categoryName = category[0].textContent;
  window.open("/php/XML-Project/" + categoryName + ".php");
});
