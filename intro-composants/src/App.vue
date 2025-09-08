<script setup lang="ts">
import Header from '@/components/Header.vue'
import Main from '@/components/Main.vue'
import Footer from '@/components/Footer.vue'
// Il serait possible d'écrire ./components/Header.vue
// mais @ sera plus pratique si l'arborescence est complexe
// @ représente le dossier "src"
</script>

<template>
  <!-- Un composant s'utilise avec une balise auto fermente contenant le nom du composant -->
  <Header/>
  <Main/>
  <Footer/>
</template>

<style scoped></style>
