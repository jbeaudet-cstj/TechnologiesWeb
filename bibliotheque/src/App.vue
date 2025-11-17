<script setup lang="ts">
import { ref } from 'vue';
import { invokeMethod } from './utils/connexion';

interface ILoan {
  id: number
  member_id: number
  book_id: number
  loan_date: Date
  return_date: Date
}

type INewLoan = Omit<ILoan, 'id' | 'loan_date' | 'return_date'>


const membre = ref<number>()
const livre  = ref<number>()

const nouvelEmprunt = ref<ILoan | null>(null)
const nouvelleErreur = ref<string | null>(null)
const nouveauDebut = ref(true)


async function creerEmprunt() {
  if (membre.value && livre.value) {
    nouvelleErreur.value = null
    nouvelEmprunt.value = null
    nouveauDebut.value = false

    let nouveau : INewLoan = {
      member_id: membre.value,
      book_id: livre.value
    }

    membre.value = undefined
    livre.value = undefined

    try {
      nouvelEmprunt.value = await invokeMethod('http://localhost/projets-php-joel/07-Bibliotheque/loans.php', 'POST', nouveau)
    }
    catch (e) {
      nouvelleErreur.value = e.message
    }
  }
}
</script>



<template>
  <h1>Nouvel emprunt</h1>
  <p><label>Membre: </label><input type="text" v-model="membre"></p>
  <p><label>Livre: </label><input type="text" v-model="livre"></p>
  <button @click="creerEmprunt">Ajouter</button>

  <div v-if="nouvelleErreur">
    <p>Une erreur est survenue: {{ nouvelleErreur }}</p>
  </div>
  <div v-else-if="nouvelEmprunt">
    <pre>{{ nouvelEmprunt }}</pre>
  </div>
  <div v-else-if="!nouveauDebut">
    <p>Chargement en cours...</p>
  </div>
</template>

<style scoped></style>
