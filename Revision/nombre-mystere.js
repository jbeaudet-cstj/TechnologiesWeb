const VALEUR_MAX = 100
document.getElementById("limite").innerHTML = VALEUR_MAX;

// Le nombre à deviner
let nombreMystere = 1 + Math.floor(Math.random() * VALEUR_MAX);
console.log("Nombre mystère: ", nombreMystere)
// Le nombre de tentatives du joueur
let nbTentatives = 0;

// Affichage du nombre de tentatives
const tentatives = document.getElementById("tentatives");
// Affichage du résultat
const resultat = document.getElementById("resultat");
// L'essai courant
const essaiCourant = document.getElementById("essai");

function verifier() {
   ++nbTentatives;
   tentatives.innerHTML = "" + nbTentatives + " tentative" + (nbTentatives > 1 ? "s" : "");

   if (essaiCourant.value > nombreMystere) {
      resultat.innerHTML = "Trop haut";
   }
   else if (essaiCourant.value < nombreMystere) {
      resultat.innerHTML = "Trop bas";
   }
   else {
      resultat.innerHTML = "Succès";
   }
}