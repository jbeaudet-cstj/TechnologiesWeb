<script setup lang="ts">
import type { Niveau } from '@/models/Notification'

let niveau: Niveau = "info"
</script>


<template>
  <div class="notification info"> <!-- Assigner la bonne classe selon le niveau -->
    <div class="gauche">
      <img src="/info.png" alt="icon">  <!-- Choisir la bonne image selon le niveau -->
    </div>
    <div class="droite">
      <p>{{ niveau.charAt(0).toUpperCase() + niveau.slice(1) }}</p>
      <p>Ceci est un test</p>
    </div>
    <button>&times;</button>
  </div>
</template>


<style scoped>
/* L'une des 4 classes suivantes est assignée selon le niveau */
.avertissement {
  border-left: 8px solid #FC8622;
}

.erreur {
  border-left: 8px solid #DA3055;
}  

.info {
  border-left: 8px solid #0070E0;
}  

.succes {
border-left: 8px solid #04A65B;
}

.notification {
  width: 15rem;
  height: 100%;
  padding: 10px;
  background-color: #fafafa;
  border-radius: 7px;
  display: grid;
  grid-template-columns: 1.7fr 6fr 0.5fr;
  box-shadow: 0 15px 30px rgba(0,0,0,0.08);
}

.notification:not(:last-child) {
  margin-bottom: 20px;
}

.gauche, .droite {
  align-self: center;
} 

.gauche img {
  height: 35px;
}

.droite p:first-child {
  font-size: 16px;
  font-weight: 600;
  color: #101020;
}

.droite p:last-child {
  font-size: 12px;
  font-weight: 400;
  color: #656565;
}

.notification button {
  align-self: flex-start;
  background-color: transparent;
  font-size: 25px;
  color: #656565;
  line-height: 0;
  cursor: pointer;
  border: hidden;
}
</style>
