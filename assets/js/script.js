// ------------------------------- MODE SOMBRE ------------------------------ //

const moonIcon = document.getElementById('moon-icon');
const navbar = document.getElementById('web-nav');
// console.log(moonIcon)

// récupérer la valeur de isDarkMode dans le localStorage
let isDarkMode = localStorage.getItem('isDarkMode') === 'true';

// mettre à jour l'icône en fonction de la valeur de isDarkMode
if (isDarkMode) {
  document.body.classList.add('dark-mode');
  navbar.classList.add('dark-mode');
  moonIcon.setAttribute('src', './assets/images/sun.png');
  moonIcon.setAttribute('alt', 'Mode nuit');
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
  } else {
    document.body.classList.add('dark-mode');
    navbar.classList.add('dark-mode');
    moonIcon.setAttribute('src', './assets/images/sun.png');
    moonIcon.setAttribute('alt', 'Mode nuit');
  }

  // mettre à jour la valeur de isDarkMode dans le localStorage
  isDarkMode = !isDarkMode;
  localStorage.setItem('isDarkMode', isDarkMode);
});

// ------------------------------- FAVORIS ------------------------------ //

// Pour ajouter aux favoris, quand tu cliques sur le coeur ça l'ajoute aux favoris
const favorites = document.querySelectorAll('.fa-heart');
console.log(favorites)
table = []

favorites.forEach(element => { 
  element.addEventListener('click', () => {
    table.push(element.parentNode)
    console.log(table)
    // Enregistrement local storage 
    // localStorage.setItem('favorites',JSON.stringify(table))
    // table.push(favorites)
  })
});
