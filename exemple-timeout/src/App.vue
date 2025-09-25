<script setup lang="ts">
import { ref } from 'vue'

const visible = ref(false)
let timeOutId:number = 0

let tableau2D: number[][] = [] //[ [ 1, 2, 3], [ 4, 5, 6 ] ]

function initTableau(lignes: number, colonnes: number) {
  tableau2D.length = 0
  for (let l = 0; l < lignes; ++l) {
    tableau2D.push([])
    for (let c = 0; c < colonnes; ++c) {
      tableau2D[l].push(Math.random())
    }
  }
}

initTableau(3, 5)
console.log(tableau2D)

function afficher() {
  visible.value = true
  timeOutId = setTimeout(effacer, 5000); // ms
}

function effacer() {
  visible.value = false
  clearTimeout(timeOutId)
  alert("Message effacé")
}
</script>

<template>
<button @click="afficher" :disabled="visible">Afficher</button>
<button @click="effacer" :disabled="!visible">Effacer</button>
<p v-if="visible">Bonjour tout le monde</p>
</template>

<style scoped></style>
