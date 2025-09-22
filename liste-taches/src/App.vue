<script setup lang="ts">
import { ref } from 'vue'


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
/* listeTaches.value.push(new Tache("Tâche 1")) */

const listeAFaire = ref<ITache[]>(listeTaches.value.filter(t => !t.estTerminee))

const estRouge = ref(false)
const estGris = ref(false)
</script>

<template>
   <h1 :class="{ rouge: estRouge, gris: estGris }">Ceci est un test</h1>
</template>

<style scoped>
.rouge {
   color: red;
}
.gris {
   background-color: grey;
}
</style>
