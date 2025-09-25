<script setup lang="ts">
import { computed, ref } from 'vue'


// En JavaScript il est possible de définir des variables de type 'objet'
// en spécifiant entre {} les attributs et les valeurs
let tache1 = { description: "Quelque chose à faire", estTerminee: false }
let tache2 = { description: "Quelque chose d'autre à faire", estTerminee: false }
// tache1 et tache2 sont considérée du même type car ce sont 2 objets avec les mêmes attributs

interface ITache {
   readonly id: number
   description: string
   estTerminee: boolean
}

class Tache implements ITache {
   readonly id: number
   description: string
   estTerminee: boolean = false

   constructor(description: string) {
      this.id = Tache._dernierId++
      this.description = description
   }

   private static _dernierId: number = 1
}

const listeTaches = ref<ITache[]>([])
listeTaches.value.push(new Tache("Tâche 1"))
listeTaches.value.push(new Tache("Tâche 2"))
listeTaches.value.push(new Tache("Tâche 3"))
listeTaches.value.push(new Tache("Tâche 4"))

const listeAFaire = computed<ITache[]>(() => listeTaches.value.filter(t => !t.estTerminee))

const estRouge = ref(false)
const estGris = ref(false)
</script>

<template>
   <h1 :class="{ rouge: estRouge, gris: estGris }">Ceci est un test</h1>

   <ul>
      <!-- Si le contenu de la liste change dynamiquement (suppression, ajout au milieu, réordonnancement)
           l'affichage ne se mettra pas à jour correctement
           Pour s'assurer d'un affichage correct, il faut associer à chaque élément un identifiant
           unique avec l'attribut :key (utilisable uniquement avec v-for) -->
      <li v-for="tache in listeAFaire" :key="tache.id">
         <input type="checkbox" v-model="tache.estTerminee">{{ tache.id }} : {{ tache.description }}
      </li>
   </ul>
</template>

<style scoped>
.rouge {
   color: red;
}
.gris {
   background-color: grey;
}
</style>
