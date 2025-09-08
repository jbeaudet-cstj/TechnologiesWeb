<script setup lang="ts">
// On a besoin de `ref` pour ajouter du dynamisme à l'application
import { ref } from 'vue'

const siteCitation = "https://www.dicocitations.com/auteur/"

// ref crée une référence sur une donnée (comme ref en C#, ou & en C++)
// const puisque la référence ne changera pas, elle va référencer la même donnée
// c'est la donnée qui va changer
const citation = ref("Je crois beaucoup en la chance, et je constate que plus je travaille, plus elle me sourit.")
const auteur = ref("Thomas Jefferson")
//const lien = ref("https://www.dicocitations.com/auteur/2309/Thomas_Jefferson.php")
const idAuteur = ref(2309)
const disabled = ref(false)

function choisirSuivante() {
   console.log("Choix suivante")
   // citation et auteur sont des constantes, il faut modifier la valeur référencée
   // pour cela, on utilise l'attibut value
   citation.value = "J'aime mieux avoir des remords que des regrets."
   auteur.value = "Oscar Wilde"
   idAuteur.value = 4630
   disabled.value = true
}
</script>

<template>
  <main>
    <section>
      <!-- Dans le HTML, il n'est pas nécessaire de mettre le .value, c'est fait automatiquement -->
      <p>{{ citation }}</p>
      <!-- Il n'est pas possible d'utiiser {{ }} pour un attribut HTML. Il faut utiliser la directive v-bind -->
      <!-- <a target="_blank" v-bind:href="siteCitation + idAuteur + '/' + auteur.split(' ').join('_') + '.php'"><span>{{ auteur }}</span></a>
         Il est possible de remplacer v-bind: par : -->
      <a target="_blank" :href="siteCitation + idAuteur + '/' + auteur.split(' ').join('_') + '.php'"><span>{{ auteur }}</span></a>
    </section>

    <!-- Pour lier un événement à une action, on utilise la directive v-on -->
    <!-- <button v-on:click="choisirSuivante">Suivante</button>
         Il est possible de remplacer v-on: par @ -->
    <!-- <button :disabled="disabled" @click="choisirSuivante">Suivante</button>
          Si la référence porte le même nom que l'attribut auquel elle est associée, il est possible de l'omettre -->
    <button :disabled @click="choisirSuivante">Suivante</button>
  </main>
</template>

<style scoped>
main {
    background: #d6ccd9;
    max-width:80%;
    border-radius:20px 20px 20px 20px;
    padding:35px;
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:10px;
}

section {
    display: flex;
    width:100%;
    flex-direction:column;
    gap:10px;
    margin-bottom:25px;
}

p {
    font-weight:bold;
    font-style: italic;
    font-size:2rem;
    text-align:left;
}

p::before {
    content: '« '
}

p::after {
    content: ' »'
}

span, a {
    align-self:end;
    color: #6d4475;
}

span::before {
    content: "— "
}

button {
    background:#6d4475;
    color: white;
    padding:10px;
    border: 0;
    font-size:1.2rem;
    border-radius:5px 5px 5px 5px;
    font-weight:bold;
    margin-top:20px;
    cursor:pointer;
    transition: transform 0.2s;
}

button:hover{
    transform: scale(1.1);
}

button:disabled {
   background: grey;
   cursor: not-allowed;
   opacity: 0.5;
}
</style>
