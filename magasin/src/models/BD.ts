import type { IProduit } from "@/models/IProduit.ts"

export const bd: IProduit[] = [
  {
     id: 5217,
     nom: "T-Shirt en coton biologique",
     description: "100% coton biologique. Coupe classique. Résistant et durable. Protection solaire 50+.",
     prix: 54.99,
     inventaire: 34,
     avis: []
  },
  {
     id: 4328,
     nom: "Chemise en flanelle épaisse",
     description: "Chemise de plein air à manches longues, avec col boutonné. Flanelle de coton à coupe classique. Deux poches au niveau de la poitrine.",
     prix: 89.99,
     inventaire: 0,
     avis: []
  },
  {
     id: 1649,
     nom: "Pantalon de nylon régulier",
     description: "Pantalon de randonnée polyvalent, assurant confort et liberté de mouvement. Coupe droite standard, taille incurvée et genoux préformés.",
     prix: 79.99,
     inventaire: 8,
     avis: []
  }
]
