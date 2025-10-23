<script setup lang="ts">
import { ref } from 'vue'
import type { IEmployees } from '@/models/Employees'
import { getData } from '@/utils/connexion'

const debut = ref(true)
const employes = ref<IEmployees | null>(null)
const erreur = ref<string | null>(null)

const search = ref<string>()
const page = ref<number>()
const limit = ref<number>()
const sortBy = ref<string>()
const sortOrder = ref<string>()


function addToQuery(query: string, tag: string, value: any): string {
  if (value) {
    query = (query ? `${query}&` : '?') + `${tag}=${value}`
  }
  return query
}


async function getEmployes() {
   debut.value = false
   employes.value = null
   erreur.value = null

   let url = 'https://boringapi.com/api/v1/employees/'
   let query = ''


   query = addToQuery(query, 'search', search.value)
   query = addToQuery(query, 'page', page.value)
   query = addToQuery(query, 'limit', limit.value)
   query = addToQuery(query, 'sort_by', sortBy.value)
   query = addToQuery(query, 'sort_order', sortOrder.value)

   console.log(`${url}${query}`)

   try {
      employes.value = await getData<IEmployees>(`${url}${query}`)
   }
   catch (e) {
      erreur.value = (e instanceof Error ? e.message : 'Erreur inconnue')
   }
}
</script>


<template>
<h1>Liste des employés</h1>
<input type="text" v-model="search" placeholder="search">
<input type="number" v-model="page" placeholder="page">
<input type="number" v-model="limit" placeholder="limit">
<select v-model="sortBy">
   <option></option>
   <option>id</option>
   <option>first_name</option>
   <option>last_name</option>
   <option>birth_date</option>
</select>
<select v-model="sortOrder">
   <option></option>
   <option>asc</option>
   <option>desc</option>
</select>
<button @click="getEmployes">Obtenir la liste</button>

<div v-if="erreur">
   <p>Une erreur est survenue: {{ erreur }}</p>
</div>
<div v-else-if="employes">
   <p>Nombre de pages: {{ employes.total_pages }}</p>
  <ul>
    <li v-for="e in employes.employees">
       <p>{{ e.first_name }} {{ e.last_name }}</p>
       <p>User id: {{ e.id }}</p>
       <p>Département: {{ e.department }}</p>
       <p>Date de naissance: {{ e.birth_date }}</p>
    </li>
  </ul>
</div>
<div v-else-if="!debut">
  <p>Chargement en cours...</p>
</div>
</template>
