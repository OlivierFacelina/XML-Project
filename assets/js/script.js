// ------------------------------- MODE SOMBRE ------------------------------ //

const moonIcon = document.getElementById('moon-icon');
const searchIcon = document.getElementById('search-icon');
const heartEmoji = document.getElementById('heart-emoji');
const heartCategory = document.getElementById('heart-category');
const infocircleIcon = document.getElementById('infocircle-icon');
const navbar = document.getElementById('web-nav');
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
const h2Elements = document.querySelectorAll('h2');
const h2Values = [];
const lien = document.getElementById('heart')

h2Elements.forEach(element => {
  element.addEventListener('click', () => {
    h2Values.push(element.textContent);
    console.log(h2Values);
  });
});

favorites.forEach(element => { 
  element.addEventListener('click', () => {
    // Enregistrement local storage 
    localStorage.setItem('favorites',JSON.stringify(h2Values));
  })
});

lien.addEventListener('click', (event) => {
  event.preventDefault();
  const favorites_link = JSON.parse(localStorage.getItem('favorites'));
  console.log(favorites_link);
  const favorites = JSON.parse(localStorage.getItem('favorites'));
  const results = document.querySelector('body');
  results.innerHTML = ''; // effacer les éléments actuels
  const parentDiv = document.createElement('div'); // Créer un élément div parent
favorites.forEach(value => {
    const titleDiv = document.createElement('div'); // Créer un élément div pour chaque titre
    const h2Element = document.createElement('h2'); // Créer un élément h2 pour le titre
    const h2Text = document.createTextNode(value); // Créer un noeud de texte avec la valeur du titre
    h2Element.appendChild(h2Text); // Ajouter le texte au titre h2
    const description = "Description du titre " + value; // Créer une description pour chaque titre
    const descriptionParagraph = document.createElement('p'); // Créer un élément p pour la description
    const descriptionText = document.createTextNode(description); // Créer un noeud de texte avec la description
    descriptionParagraph.appendChild(descriptionText); // Ajouter le texte à l'élément p
    titleDiv.appendChild(h2Element); // Ajouter le titre h2 à l'élément div du titre
    titleDiv.appendChild(descriptionParagraph); // Ajouter la description à l'élément div du titre
    parentDiv.appendChild(titleDiv); // Ajouter l'élément div du titre à l'élément div parent
});

results.appendChild(parentDiv); // Ajouter l'élément div parent à l'élément parent "results"

})


