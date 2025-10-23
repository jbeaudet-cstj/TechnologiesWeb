<script setup lang="ts">
import { ref } from 'vue'
import Utilisateurs from '@/components/Utilisateurs.vue'
import Utilisateur from '@/components/Utilisateur.vue'
import Employes from './components/Employes.vue'
import UtilisateurV2 from '@/components/UtilisateurV2.vue'
import Commentaire from '@/components/Commentaire.vue'

const listeComponents = [ Utilisateurs, Utilisateur, Employes, UtilisateurV2, Commentaire ]
const composants = [ 'Utilisateurs', 'Utilisateur', 'Employés', 'Utilisateur version 2', 'Commentaires' ]
const selection = ref(0)
</script>



<template>
  <div>
    <span v-for="(c, i) in composants">
      <input type="radio" :value="i" v-model="selection">
      <label>{{ c }}</label>
    </span>
  </div>

  <!-- 
  <Utilisateurs v-if="selection === 0"/>
  <Utilisateur v-else-if="selection === 1"/>
   -->

  <component :is="listeComponents[selection]"/>
</template>



<style scoped></style>
