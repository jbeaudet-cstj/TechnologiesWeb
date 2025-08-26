// Le bouton de changement de couleur
var btnBack = document.getElementById("buttonBack")
var btnFore = document.getElementById("buttonFore")

const MAX_COULEUR = 256

// Retourne un entier aléatoire entre 0 et 255
function randomCouleur() {
   return Math.floor(Math.random() * MAX_COULEUR);
}

// Retourne un couleur aléatoire
function randomRGB() {
   let r = randomCouleur();
   let g = randomCouleur();
   let b = randomCouleur();

   return "rgb(" + r + "," + g + "," + b + ")";
}

// Callback sur clic pour changer la couleur de fond
btnBack.onclick = function() {
   let rndCol = randomRGB();
   document.querySelector(".contenu").style.backgroundColor = rndCol;
   console.log("Couleur fond: ", rndCol);
}

// Callback sur clic pour changer la couleur du texte
btnFore.onclick = function() {
   let rndCol = randomRGB();
   document.querySelector(".contenu").style.color = rndCol;
   console.log("Couleur texte: ", rndCol);
}

console.log("revision.js bien chargé")