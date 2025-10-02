<script setup lang="ts">
import type { IProduit } from "@/models/IProduit.ts"
import FormulaireAvis from "@/components/FormulaireAvis.vue"
import ListeAvis from "@/components/ListeAvis.vue"

const produit: IProduit = {
     id: 5217,
     nom: "T-Shirt en coton biologique",
     description: "100% coton biologique. Coupe classique. Résistant et durable. Protection solaire 50+.",
     prix: 54.99,
     inventaire: 34,
     avis: []
  }
</script>


<template>
  <div class="produit">
    <section class="image">
      <img :src="'/' + produit.id + '.jpg'" alt="Image produit">
    </section>
    <div>
      <h2>{{ produit.nom }}</h2>
      <p>{{ produit.description }}</p>
      <p>{{ produit.prix }}$</p>
      <p v-if="produit.inventaire > 10">En stock</p>
      <p v-else-if="produit.inventaire > 0" class="orange">Quantité limitée</p>
      <p v-else class="rouge">Rupture de stock</p>
      <button :disabled="produit.inventaire === 0">Ajouter au panier</button>
      <br>
      <button>Retour à la liste</button>
    </div>
  </div>
  <FormulaireAvis/>
  <ListeAvis/>
</template>


<style scoped>
.produit {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  border: 5px groove #918181;
  padding: 1em;
  margin: 1em;
}

img {
  height: 300px;
}

.image {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 300px;
}

.orange {
  color: orange;
}

.rouge {
  color: red;
}
</style>
