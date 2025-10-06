<script setup lang="ts">
</script>


<template>
  <!-- Il est possible de mettre un contenu par défaut utilisé si rien n'est donné au composant -->
   <!-- button est le seul élément dans le template -->
    <button><slot>Cliquez moi</slot></button>
</template>


<style scoped>
button{
  cursor: pointer;
  background: #4451c7;
  color: white;
  font-weight: bold;
  border: 0;
  border-radius: 5px;
  padding: 7px 20px;
  font-size: 1rem;
  transition: transform 0.2s;
  margin: 10px 0;
}

button:not(:disabled):hover {
  transform: scale(1.1);
}

button:disabled {
   background: grey;
   cursor: not-allowed;
   opacity: 0.5;
}
</style>
