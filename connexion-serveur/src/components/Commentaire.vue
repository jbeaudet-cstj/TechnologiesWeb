<script setup lang="ts">
import { ref } from 'vue';
import type { IComment, INewComment, IUpdatedComment } from '@/models/Comment';
import { invokeMethod } from '@/utils/connexion';

const postId = ref<number>()
const nom = ref<string>()
const email = ref<string>()
const body = ref<string>()

const debut = ref(true)
const commentaire = ref<IComment | null>(null)
const erreur = ref<string | null>(null)


async function creerCommentaire() {
  commentaire.value = null
  if (postId.value && nom.value && email.value && body.value) {
    let nouveau: INewComment = {
      postId: postId.value,
      name: nom.value,
      email: email.value,
      body: body.value
    }

    try {
      commentaire.value = await invokeMethod<INewComment, IComment>('https://jsonplaceholder.typicode.com/comments', 'POST', nouveau)
      /*
      const reponse = await fetch('https://jsonplaceholder.typicode.com/comments', {
        method: 'POST',
        body: JSON.stringify(nouveau),
        headers: {
          'Content-type': 'application/json; charset=UTF-8'
        }
      })

      // Contrairement à axios, fetch ne lance pas d'exception pour un status autre que 2xx
      if (!reponse.ok) { // ok = statut entre 200 et 299
        throw new Error(`Statut: ${reponse.status}`)
      }

      commentaire.value = await reponse.json()
      */
    }
    catch (e) {
      erreur.value = (e instanceof Error ? e.message : 'Erreur inconnue')
    }
  }
}


async function modifierCommentaire() {
  commentaire.value = null
  let modification: IUpdatedComment = {
    email: 'test@example.com'
  }

  try {
    commentaire.value = await invokeMethod<IUpdatedComment, IComment>('https://jsonplaceholder.typicode.com/comments/2', 'PATCH', modification)
  }
  catch (e) {
      erreur.value = (e instanceof Error ? e.message : 'Erreur inconnue')
  }
}
</script>



<template>
  <h1>Modification de commentaires</h1>

  <p><label>Post id: </label><input type="number" v-model="postId"></p>
  <p><label>Nom: </label><input type="text" v-model="nom"></p>
  <p><label>Email: </label><input type="text" v-model="email"></p>
  <p><label>Body: </label><input type="text" v-model="body"></p>
  <button @click="creerCommentaire">Créer commentaire</button>
  <button @click="modifierCommentaire">Modifier commentaire</button>

  <div v-if="erreur">
    <p>Erreur: {{ erreur }}</p>
  </div>
  <div v-else-if="commentaire">
    <p>
    <pre>{{ commentaire }}</pre>
    </p>
  </div>
  <div v-else-if="!debut">
    <p>Chargement en cours...</p>
  </div>
</template>