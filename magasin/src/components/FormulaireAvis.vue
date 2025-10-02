<script setup lang="ts">
import { ref } from "vue"
import type { IAvis } from "@/models/IAvis.ts"

const avisCourant = ref<IAvis>({ nom: "", date: new Date, commentaire: "", evaluation: 0})
const erreurNom = ref(false)
const erreurCommentaire = ref(false)
const erreurEvaluation = ref(false)

function soumettre() {
  erreurNom.value = (avisCourant.value.nom === "")
  erreurCommentaire.value = (avisCourant.value.commentaire === "")
  erreurEvaluation.value = (avisCourant.value.evaluation === 0)

  if (!erreurNom.value && !erreurCommentaire.value && !erreurEvaluation.value) {
    avisCourant.value.nom = ""
    avisCourant.value.commentaire = ""
    avisCourant.value.evaluation = 0
  }
}
</script>



<template>
  <!-- Le modificateur 'prevent' empêche l'action normale de l'événement submit, qui est d'envoyer le formulaire -->
  <form @submit.prevent="soumettre">
    <h3>Écrire un avis</h3>
    <p v-if="erreurNom || erreurCommentaire || erreurEvaluation" class="erreur">Tous les champs doivent être remplis</p>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" v-model="avisCourant.nom" :class="{ bordureerreur: erreurNom}">

    <label for="commentaire">Commentaire:</label>      
    <textarea id="commentaire" v-model="avisCourant.commentaire" :class="{ bordureerreur: erreurCommentaire}"></textarea>

    <label for="evaluation">Évaluation:</label>
    <select id="evaluation" v-model="avisCourant.evaluation" :class="{ bordureerreur: erreurEvaluation}">
      <!-- v-for peut itérer sur une suite de nombre à partir de 1 -->
      <option v-for="i in 5">{{ i }}</option>
    </select>

    <input type="submit" value="Soumettre">
  </form>
</template>



<style scoped>
form {
  display: flex;
  flex-direction: column;
  width: 500px;
  padding: 10px;
  margin: 20px;
  border: 2px solid #cfcfcf;
  background-color: #f0f0f0;
}

label {
   margin-bottom: 5px;
 }
 
input[type=text] {
  height: 20px;
  margin-bottom: 10px;
}

textarea {
  height: 70px;
  padding: 10px;
  margin-bottom: 20px;
}

select {
  height: 30px;
  width: 10%;
}

input[type=submit] {
  margin: 5px auto;
  font-weight: bold;
  font-size: 20px;
  padding: 5px 15px;
  background-color: lightsteelblue;
}

.erreur {
  color: red;
  font-style: italic;
  margin: 0;
}

.bordureerreur {
  border-color: red;
}
</style>