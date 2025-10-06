<script setup lang="ts">
</script>


<template>
   <section id="banniere">
      <header>
         <!-- On peut avoir plusieur slots en les identifiant avec un nom.
              Une seule slot peut ne pas avoir de nom -->
         <slot name="entete"/>
      </header>
      <!-- L'élément slot permet d'insérer tout le code HTML donné lors de l'utilisation du composant -->
      <slot/>
      <footer>
         <slot name="pieddepage"/>
      </footer>
   </section>
</template>


<style scoped>
#banniere {
   background-color: aqua;
   padding: 10px;
   text-align: center;
}

header {
   font-style: italic;
   color: brown;
}
</style>
