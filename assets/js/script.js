const moonIcon = document.getElementById('moon-icon');
// console.log(moonIcon)

// récupérer la valeur de isDarkMode dans le localStorage
let isDarkMode = localStorage.getItem('isDarkMode') === 'true';

// mettre à jour l'icône en fonction de la valeur de isDarkMode
if (isDarkMode) {
  document.body.classList.add('dark-mode');
  moonIcon.setAttribute('src', './assets/images/sun.png');
  moonIcon.setAttribute('alt', 'Mode nuit');
} else {
  document.body.classList.remove('dark-mode');
  moonIcon.setAttribute('src', './assets/images/moon.png');
  moonIcon.setAttribute('alt', 'Mode clair');
}

moonIcon.addEventListener('click', () => {
  if (isDarkMode) {
    document.body.classList.remove('dark-mode');
    moonIcon.setAttribute('src', './assets/images/moon.png');
    moonIcon.setAttribute('alt', 'Mode clair');
  } else {
    document.body.classList.add('dark-mode');
    moonIcon.setAttribute('src', './assets/images/sun.png');
    moonIcon.setAttribute('alt', 'Mode nuit');
  }

  // mettre à jour la valeur de isDarkMode dans le localStorage
  isDarkMode = !isDarkMode;
  localStorage.setItem('isDarkMode', isDarkMode);
});
