<script setup lang="ts">
import type { IProduit } from "@/models/IProduit.ts"

// Cette interface permet de définir les paramètres que le composant peut recevoir
interface IProps {
  index: number
  produit: IProduit
}

// defineProps permet de spécifier les arguments du composant
// La constante props sert à accéder aux paramètres dans la section script
const props = defineProps<IProps>()

// defineEmits permet de définir des événements qui peuvent être envoyés
// au composant parent
// la constante emit est une fonction qu'on utilise pour générer l'événement
const emit = defineEmits<{
  // nom de l'événement: [ liste de paramètres ]
  ajouter: [ index: number /*, p2: string */ ]
}>()

function ajouterAuPanier() {
  // Avec la fonction retournée par defineEmits, on génère l'évémenent
  // et on spécifie les arguments
  emit('ajouter', props.index)
}

</script>


<template>
  <div class="produit">
    <section class="image">
      <img :src="'/' + produit.id + '.jpg'" alt="Image du produit">
    </section>
    <div>
      <h2>{{ produit?.nom }}</h2>
      <p>{{ produit?.prix }}$</p>
      <button :disabled="produit.inventaire === 0" @click="ajouterAuPanier">Ajouter au panier</button>
    </div>
  </div>
</template>


<style scoped>
.produit {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  border: 1px solid #474040;
  padding: 1em;
  margin: 1em;
}

img {
  height: 200px;
}

.image {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 200px;
}
</style>
