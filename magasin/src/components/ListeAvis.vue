<script setup lang="ts">
import type { IAvis } from "@/models/IAvis.ts"

let listeAvis: IAvis[] = []
</script>



<template>
  <div class="liste">
    <h3>Avis:</h3>
    <p v-if="listeAvis.length === 0">Soyez le premier à laisser un avis</p>
    <ul v-else>
      <li v-for="avis in listeAvis">
        <span><strong>{{ avis.nom }}</strong> - {{ avis.date }}</span>
        <br/>
        <span>Évaluation: {{ avis.evaluation }}</span>
        <br/>
        <span>{{ avis.commentaire }}</span>
        <hr>
      </li>
    </ul>
  </div>
</template>



<style scoped>
.liste {
  padding: 20px;
  margin: 20px;
  border: 2px solid #cfcfcf;
}

li {
  margin-bottom: 30px;
}

ul {
  list-style-type: none;
}
</style>
