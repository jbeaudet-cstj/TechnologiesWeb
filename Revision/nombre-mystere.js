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

essaiCourant.addEventListener("keypress", (event) => {
   if (event.key === "Enter") {
      verifier();
   }
})

function verifier() {
   ++nbTentatives;
   tentatives.innerHTML = "" + nbTentatives + " tentative" + (nbTentatives > 1 ? "s" : "");

   if (essaiCourant.value > nombreMystere) {
      resultat.innerHTML = "Trop haut";
      resultat.className = "tropHaut";
   }
   else if (essaiCourant.value < nombreMystere) {
      resultat.innerHTML = "Trop bas";
      resultat.className = "tropBas";
   }
   else {
      resultat.innerHTML = "Succès";
      resultat.className = "succes";
   }
}

// TODO:
//  - Valider l'essai entre 1 et 100. Message d'erreur sinon, et n'augmente pas les tentatives
//  - Lorsque nombre trouvé:
//     - Enter ne fait rien
//     - Le bouton indique "Rejouer"
//     - Si bouton cliqué, recommence un nouveau jeu
//  - Maximum 10 tentatives