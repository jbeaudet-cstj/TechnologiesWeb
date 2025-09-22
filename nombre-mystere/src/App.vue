<script setup lang="ts">
// On a besoin de computed pour créer des références qui dépendent de l'évaluation d'une expression
import { ref, computed } from 'vue'

// Typescript permet de définir des unions: une liste de valeurs possibles qui définit un nouveau type
type Resultat = "haut" | "bas" | "succes" | "invalide" | "max"

const min = 1
const max = 100
const maxTentatives = 7

const nbTentatives = ref(0)
const nombreMystere = ref(genererNbMystere())
// S'il n'y a pas de valeur initiale, la valeur est 'undefined'
// Pour indiquer le type de la variable, on le met entre <>
const tentative = ref<number>()
const derniereTentative = ref<number>()
const resultat = ref<Resultat>()
const listeTentatives = ref<string[]>([])

// La référence est initialisée selon le résultat, mais sa valeur ne change plus
// Il faut la modifier dans une fonction si le résultat change
// gameOver = ...
//const gameOver = ref<boolean>(resultat.value == 'succes' || resultat.value == 'max')

// computed permet de définir une référence qui contient l'évalation d'une expression
// Si resultat change, la valeur calculée change en même temps
// Il faut donner en argument une fonction qui calcule l'expression
const gameOver = computed<boolean>(() => resultat.value == 'succes' || resultat.value == 'max')


function genererNbMystere(): number {
// Math.randon() --> nombre réel entre 0 (inclus) et 1 (non inclus): 0 .. 0.9999999999999999999999999999999
// Math.randon() * 100 --> 0 .. 99.9999999999999999
// Math.floor(...) --> 0 .. 99
// 1 + ... --> 1 .. 100
  return min + Math.floor(Math.random() * max)
}


function rejouer(): void {
  nombreMystere.value = genererNbMystere()
  nbTentatives.value = 0
  resultat.value = undefined
  listeTentatives.value.length = 0
}


function verifier(): void {
  // Il faut vérifier si tentative contient une valeur
  if (tentative.value) {
    derniereTentative.value = tentative.value
    tentative.value = undefined

    if (derniereTentative.value >= min && derniereTentative.value <= max) {
      ++nbTentatives.value

      if (derniereTentative.value == nombreMystere.value) {
        // Succes
        // Impossible d'assigned une valeur qui ne fait pas partie du type Resultat
        //resultat.value = "success"
        resultat.value = "succes"
      }
      else if (nbTentatives.value >= maxTentatives) {
        // Max atteint
        resultat.value = "max"
      }
      else if (derniereTentative.value > nombreMystere.value) {
        // Trop haut
        resultat.value = "haut"
        ajouterAListe()
      }
      else { // derniereTentative.value < nombreMystere.value
        // Trop bas
        resultat.value = "bas"
        ajouterAListe()
      }
    }
    else {
      // Invalide
     resultat.value = "invalide"
    }
  }
}

function ajouterAListe() {
  listeTentatives.value.push(derniereTentative.value + " : " + resultat.value)
}
</script>


<template>
  <h1>Nombre mystère</h1>
  <h2>Devinez le nombre mystère entre {{ min }} et {{ max }} (en {{ maxTentatives }} tentatives ou moins)</h2>

  <h3>Votre essai</h3>
  <!-- v-bind est unidirectionnelle, elle ne permet pas de récupérer la valeur de la page
       Pour avoir un échange bidirectionnel, il faut utiliser la directive v-model -->
  <input type="number" placeholder="Tentative" :min="min" :max="max" v-model="tentative" @keyup.enter="verifier"
         :disabled="gameOver">
  <button v-if="gameOver" @click="rejouer">Rejouer</button>
  <button v-else :disabled="!tentative" @click="verifier">Vérifier</button>
  <p>{{ nbTentatives > 0 ? nbTentatives + " tentative" : "" }}{{ nbTentatives > 1 ? "s" : "" }}</p>

  <h3>Résultat</h3>
  <p v-if="resultat === 'haut'" class="blanc tropHaut">{{ derniereTentative }} est trop haut</p>
  <p v-else-if="resultat === 'bas'" class="blanc tropBas">{{ derniereTentative }} est trop bas</p>
  <p v-else-if="resultat === 'succes'" class="blanc succes">Félicitations, {{ derniereTentative }} est le nombre mystère</p>
  <p v-else-if="resultat === 'invalide'" class="blanc invalide">{{ derniereTentative }} est invalide</p>
  <p v-else-if="resultat === 'max'" class="blanc invalide">Nombre maximum de tentatives atteint, le nombre mystère était {{  nombreMystere }}</p>
  <p v-else></p>

  <hr>
  <ul>
    <li v-for="essai in listeTentatives">{{ essai }}</li>
  </ul>
</template>


<style scoped>
.blanc {
  color: white;
}

.tropHaut {
  background-color: orange;
}

.tropBas {
  background-color: violet;
}

.succes {
  background-color: green;
}

.invalide {
  background-color: red;
}
</style>
