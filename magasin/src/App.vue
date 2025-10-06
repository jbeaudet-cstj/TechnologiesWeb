<script setup lang="ts">
import { ref } from "vue"
import type  { IProduit } from "@/models/IProduit.ts"
import { bd } from "@/models/BD.ts"
import ProduitSommaire from "@/components/ProduitSommaire.vue"
import Panier from "./components/Panier.vue"
import ProduitDetails from "@/components/ProduitDetails.vue"
import Banniere from "@/components/Banniere.vue"
import Bouton from "@/components/Bouton.vue"

const panier = ref<IProduit[]>([])
const afficherPanier = ref(false)

const produitAffiche = ref(-1)

function ajouterAuPanier(index: number) {
  if (bd.value && bd.value[index]) {
    panier.value.push(bd.value[index])
  }
}
</script>



<template>
  <header>
    <h1>Vêtements et accessoires Vue</h1>
    <!-- Puisque Bouton ne contient qu'un seul élément dans son template, tous les attributs donnés
         sont passés à cet élément -->
    <Bouton @click="afficherPanier = !afficherPanier">Panier ({{ panier.length }})</Bouton>
  </header>

  <Banniere>
    <!-- Slot identifiée: template # + nom de la slot -->
    <template #entete>
      Offre exclusive
    </template>
    <!-- Slot par défaut -->
    🎉 Jusqu'à <strong>20%</strong> de rabais sur votre première commande 🎉
  </Banniere>

  <Panier v-if="afficherPanier" :liste-produits="panier"/>
  <ProduitDetails v-else-if="produitAffiche >= 0 && produitAffiche < bd.length"/>
  <!-- Avec v-for, il est possible de récupérer l'index de chaque élément
       avec la syntaxe (item, index) -->
  <!-- :produit et :index sont les props de ProduitSommaire  -->
  <!-- ajouter est un événement émis par ProduitSommaire -->
  <ProduitSommaire v-else v-for="(p, i) in bd" :produit="p" :index="i" @ajouter="ajouterAuPanier"/>
</template>



<style scoped>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 60px;
  margin-bottom: 25px;
}
</style>
