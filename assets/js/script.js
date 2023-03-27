// ------------------------------- MODE SOMBRE ------------------------------ //

const moonIcon = document.getElementById('moon-icon');
const searchIcon = document.getElementById('search-icon');
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
  searchIcon.setAttribute('src', './assets/images/searchnormal.png');
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
    searchIcon.setAttribute('src', './assets/images/searchnormal.png');
    heartEmoji.setAttribute('src', './assets/images/heart.png');
    infocircleIcon.setAttribute('src', './assets/images/infocircle.png');
  } else {
    document.body.classList.add('dark-mode');
    navbar.classList.add('dark-mode');
    moonIcon.setAttribute('src', './assets/images/sunlight.png');
    moonIcon.setAttribute('alt', 'Mode nuit');
    searchIcon.setAttribute('src', './assets/images/searchnormal.png');
    heartEmoji.setAttribute('src', './assets/images/heartlight.png');
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
let values = [];
const link = document.getElementById('heart')
let isActive = false

favorites.forEach(element => { 
  element.addEventListener('click', () => {
    if (isActive) {
      isActive = false
      element.classList.replace("fa-solid","fa-regular");
      const index = values.indexOf(element.id);
      if (index !== -1) {
        values.splice(index, 1);
      }
      // alert("Favori désactivé.")
    }
    else {
      isActive = true
      element.classList.replace("fa-regular","fa-solid");
      values.push(element.id);
      // Enregistrement cookies
      // console.log(element.id)
    }
    document.cookie = `favorites=${JSON.stringify(values)};expires=Thu, 01 Jan 2099 00:00:00 UTC;path=/`;
  })
});

// On va récup le cookie existant grâce à cette fonction
// function getCookie(name) {
//   const value = `; ${document.cookie}`;
//   const parts = value.split(`; ${name}=`);
//   if (parts.length === 2) {
//     return parts.pop().split(';').shift();
//   }
// }

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

const input = document.querySelector('input');
const elements = document.querySelectorAll('h3');
const article = document.querySelector('.article');
// console.log(elements.textContent)

input.addEventListener('input',(e) => {
  let content = e.target.value;
elements.forEach((category) => {
  if(category.textContent.indexOf(content) >= 0) {
    category.style.display = "";
    result = category.textContent.replace(content,`<span class="highlight">${content}</span>`)
    // console.log(result)
    category.innerHTML = `<h3>${result}</h3>`;
    // category.style.backgroundColor = "black"
  } else {
    article.style.display = "none"
  }
})
})

// const categories = ['Insolite','Politique','Sport','Gastronomie','Culture','Cinéma','Musique','High-tech'];
// const searchForm = document.getElementById('search-form');
// const searchInput = document.getElementById('search-input');
// const categorySelect = document.getElementById('category');

// // Flux correspondant à chaque catégorie
// const feeds = {
//   'Insolite': 'http://www.lepoint.fr/insolite/rss.xml',
//   'Politique': 'http://www.lepoint.fr/politique/rss.xml',
//   'Sport': 'http://www.lepoint.fr/sport/rss.xml',
//   'Gastronomie': 'http://www.lepoint.fr/gastronomie/rss.xml',
//   'Culture': 'http://www.lepoint.fr/culture/rss.xml',
//   'Cinéma': 'http://www.lepoint.fr/cinema/rss.xml',
//   'Musique': 'http://www.lepoint.fr/musique/rss.xml',
//   'High-tech': 'http://www.lepoint.fr/high-tech-internet/planete-appli/rss.xml'
// };

// function searchCategories() {
//   // On va récup la valeur de l'input de recherche et la catégorie sélectionnée
//   const searchString = searchInput.value.toLowerCase();
//   const category = categorySelect.value;

//   // On filtre les catégories qui correspondent à la recherche
//   let filteredCategories;
//   if (category === '') {
//     // Si y a rien, filtrer toutes les catégories
//     filteredCategories = categories.filter((category) => {
//       return category.toLowerCase().includes(searchString);
//     });
//   } else {
//     // Si une catégorie est sélectionnée, filtrer uniquement cette catégorie
//     filteredCategories = [category];
//   }

//   // On obtient les flux correspondant aux catégories filtrées
//   const filteredFeeds = filteredCategories.map((category) => {
//     return feeds[category];
//   });

//   // On redirige l'utilisateur vers les flux correspondants
//   window.location.href = filteredFeeds.join(',');
// }

// // Quand on valide, ça envoie les données et ça appelle la fonction définie plus haut
// searchForm.addEventListener('submit', (event) => {
//   event.preventDefault();
//   searchCategories();
// });









// JS FOR LOADING SCREEN

const black_screen = document.getElementById("blackscreen");
const headershow = document.querySelector(".headershow");
const sectionshow = document.querySelector(".sectionshow");

const chargement = document.getElementById("time_barre");
const imgapple = document.getElementById("apple_logo_pomme");
// ------------------------- //

// Foncion qui permet de mettre un delay------------
function delay(milliseconds){
    return new Promise(resolve => {
        setTimeout(resolve, milliseconds);
    });
}
// ------------------------------------------------

async function show_blackscreen() {
for (let index = 0; index <= 10000;) {
    await delay(10)
    chargement.style.width = parseFloat(index/100) + "%";
    index += 80
};

black_screen.style.opacity = 0;
for (let index = 0; index <= 50;) {
    await delay(30)
    index += 1
};
black_screen.style.display = "none";
headershow.style.display = "flex";
sectionshow.style.display = "block";
};
show_blackscreen();