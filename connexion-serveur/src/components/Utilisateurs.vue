<script setup lang="ts">
import { ref } from 'vue'
import type { IUsers } from '@/models/Users'
import { getData } from '@/utils/connexion'

const debut = ref(true)
const users = ref<IUsers | null>(null)
const erreur = ref<string | null>(null)


async function getUsers() {
   debut.value = false
   users.value = null
   erreur.value = null

   try {
      users.value = await getData<IUsers>('https://apihero-api.quixtools.com/api/v1/user/getUsers')
   }
   catch (e) {
      erreur.value = (e instanceof Error ? e.message : 'Erreur inconnue')
   }
}
</script>


<template>
<h1>Liste des utilisateurs</h1>
<button @click="getUsers">Obtenir la liste</button>

<div v-if="erreur">
   <p>Une erreur est survenue: {{ erreur }}</p>
</div>
<div v-else-if="users">
  <ul>
    <li v-for="u in users.data">
       <p>{{ u.name }}</p>
       <p>User id: {{ u.id }}</p>
    </li>
  </ul>
</div>
<div v-else-if="!debut">
  <p>Chargement en cours...</p>
</div>
</template>
