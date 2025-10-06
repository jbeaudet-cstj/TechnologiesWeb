<script setup lang="ts">
import { ref } from 'vue'
import type { Niveau } from '@/models/Notification'
import { Notification } from '@/models/Notification'
import Modale from '@/components/Modale.vue'
import Toaster from '@/components/Toaster.vue'

const titre = ref("")
const contenu = ref("")
const boutonConfirmer = ref("")
const boutonAnnuler = ref("")
const modaleVisible = ref(false)

const listeNotifications = ref<Notification[]>([])

function reset() {
  modaleVisible.value = false
  titre.value = ""
  contenu.value = ""
  boutonConfirmer.value = ""
  boutonAnnuler.value = ""
}

// Appelée lorsque le bouton de confirmation de la fenêtre modale est cliqué
function confirmer() {
  alert('Confirmer!')
  reset()
}

// Appelée lorsque le bouton d'annulation de la fenêtre modale est cliqué, ou clic à l'extérieur de la modale
function annuler() {
  reset()
}

function afficher_demo1() {
  titre.value = "Remplacement"
  contenu.value = "Le dossier comprend déjà un fichier du même nom. Voulez-vous le remplacer?"
  modaleVisible.value = true
}

function afficher_demo2() {
  titre.value = "Confirmation"
  contenu.value = "Vouvez-vous continuer?"
  boutonConfirmer.value = "Oui"
  boutonAnnuler.value = "Non"
  modaleVisible.value = true
}

function notifier(niveau: Niveau, message: string, titre: string = "") {
  let notif = new Notification(titre, message, niveau)
  notif.timeoutId = setTimeout(() => enlever(notif), 5000)
  listeNotifications.value.push(notif)
}

// Enlève un notification, après le timeout ou lorsque le bouton 'x' est cliqué
function enlever(notif: Notification) {
  clearTimeout(notif.timeoutId)
  listeNotifications.value = listeNotifications.value.filter(n => n.id !== notif.id)
}
</script>



<template>
  <div class="app">
    <h1>Démonstration de fenêtre modale</h1>
    <button @click="afficher_demo1">Démo 1</button>
    <button @click="afficher_demo2">Démo 2</button>

    <Modale v-if="modaleVisible">
    </Modale>
  </div>

  <div class="app">
    <h1>Démonstration de notifications</h1>
    <button @click="notifier('info', 'Une nouvelle version est disponible', 'Mise à jour')">Info</button>
    <button @click="notifier('succes', 'Modifications sauvegardées correctement')">Succes</button>
    <button @click="notifier('avertissement', 'Cette application comporte des scènes pouvant ne pas convenir à tous les publics')">Avertissement</button>
    <button @click="notifier('erreur', `Nom d'utilisateur ou mot de passe incorrect`, `Échec d'authentification`)">Erreur</button>

    <Toaster/>
  </div>
</template>



<style scoped>
.app {
  padding: 2rem;
  font-family: sans-serif;
}

button {
  margin-right: 1rem;
}
</style>
