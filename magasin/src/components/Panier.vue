<script setup lang="ts">
import { computed } from "vue"
import type  { IProduit } from "@/models/IProduit.ts"

// defineModel définit une valeur partagée avec le composant parent
// La string en argument est le nom a utilisé par le parent
const listeProduits = defineModel<IProduit[]>('liste-produits', { required: true})


function enlever(index: number) {
  listeProduits.value.splice(index, 1)
}


const sousTotal = computed<number>(() => listeProduits.value.reduce((somme, produit) => somme + produit.prix, 0))
</script>


<template>
  <div class="panier">
    <h2>Vote panier ({{ listeProduits.length }} item{{ listeProduits.length > 1 ? "s" : "" }})</h2>
    <h3>Sous-total: {{ sousTotal.toFixed(2) }}$</h3>
    <ul>
      <li v-for="(p, i) in listeProduits" :key="i">
        {{ p.nom }} - {{ p.prix }}
        <button @click="enlever(i)">❌</button>
      </li>
    </ul>
  </div>
</template>


<style scoped>
.panier {
  border: 1px solid #474040;
  padding: 1em;
  margin: 1em;
}

ul {
  list-style: none;
  padding: 0;
}

li {
  margin-bottom: 0.5rem;
}
</style>
