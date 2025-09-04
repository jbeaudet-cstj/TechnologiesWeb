<script setup lang="ts">
  // Section de code TypeScript
  const framework = "Vue"

  const nom = "Joël Beaudet"
  const annee = 2025
</script>

<template>
  <!-- Section HTML -->
   <main>
    <!-- On accède aux variables définies dans la section script en les entourant de {{  }}
         appelé notation moustache -->
      <h1>Notre premier composant {{framework}}!</h1>
   </main>
   <footer>
    <p>&copy; {{nom}} {{annee}}</p>
   </footer>
</template>

<style scoped>
 /* Section CSS
    scoped: ne s'applique qu'au composant de ce fichier, pas de conflit
 */
 h1 {
  font-weight: bold;
  text-align: center;
  color: blue;
 }

 footer {
  position: fixed;
  bottom: 0;
  font-style: italic;
 }
</style>
