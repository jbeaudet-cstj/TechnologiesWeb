<script setup lang="ts">
import { ref } from 'vue'
import type { IUser } from '@/models/Users'
import { getData } from '@/utils/connexion'

const debut = ref(true)
const user = ref<IUser | null>(null)
const erreur = ref<string | null>(null)
const userId = ref<number>()

async function getUser() {
   debut.value = false
   user.value = null
   erreur.value = null

   try {
      user.value = await getData<IUser>(`https://apihero-api.quixtools.com/api/v1/user/getUser/usr0${userId.value}`)
   }
   catch (e) {
      erreur.value = (e instanceof Error ? e.message : 'Erreur inconnue')
   }
}
</script>


<template>
<h1>Détails d'un utilisateur</h1>
<label>User id: </label>
<input type="number" v-model="userId">
<button @click="getUser">Obtenir l'utilisateur</button>

<div v-if="erreur">
   <p>Une erreur est survenue: {{ erreur }}</p>
</div>
<div v-else-if="user">
  <p>{{ user.data.name }}</p>
  <p>User id: {{ user.data.id }}</p>
  <p>Email: {{ user.data.email }}</p>
  <ul>
   <li v-for="a in user.data.address">
      <p>{{ a.customerAddress }}</p>
      <p>{{ a.customerCountry }}</p>
      <p>{{ a.customerZipCode }}</p>
   </li>
  </ul>
  <img :src="user.data.image" alt="Image utilisateur">
</div>
<div v-else-if="!debut">
  <p>Chargement en cours...</p>
</div>
</template>
