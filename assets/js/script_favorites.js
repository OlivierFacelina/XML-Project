// ------------------------------- MODE SOMBRE ------------------------------ //

const moonIcon = document.getElementById('moon-icon');
const heartEmoji = document.getElementById('heart-emoji');
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
  heartEmoji.setAttribute('src', './assets/images/heartlight.png');
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
    heartEmoji.setAttribute('src', './assets/images/heart.png');
    infocircleIcon.setAttribute('src', './assets/images/infocircle.png');
  } else {
    document.body.classList.add('dark-mode');
    navbar.classList.add('dark-mode');
    moonIcon.setAttribute('src', './assets/images/sunlight.png');
    moonIcon.setAttribute('alt', 'Mode nuit');
    heartEmoji.setAttribute('src', './assets/images/heartlight.png');
    infocircleIcon.setAttribute('src', './assets/images/infocirclelight.png');
  }

  // mettre à jour la valeur de isDarkMode dans le localStorage
  isDarkMode = !isDarkMode;
  localStorage.setItem('isDarkMode', isDarkMode);
});

// ____________________________________________________________________________________________________________________
//                                         ANIM NAV

const animrubrique = document.getElementById("animrubrique");
let isWhite = true;
const menu_deroulant = document.getElementById("menu-deroulant");
const mask = document.getElementById("mask")

animrubrique.addEventListener('click', event => {
    menu_deroulant.style.width = menu_deroulant.offsetWidth > 15 ? "0vw" : "20vw";
    mask.style.display = mask.offsetWidth > 15 ? "none" : "flex"
    menu_deroulant.style.backdropFilter = menu_deroulant.offsetWidth > 15 ? "none" : "blur(2.5px)"
});