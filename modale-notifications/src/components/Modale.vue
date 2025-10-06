<script setup lang="ts">
</script>


<template>
  <teleport to="body">
    <transition name="fade">
      <div class="couche">
        <div class="contenu">
          <h2>Titre de la fenêtre</h2>
          Contenu de la fenêtre

          <div class="actions">
            <button>OK</button>
            <button>Annuler</button>
          </div>
        </div>
      </div>
    </transition>
  </teleport>
</template>



<style scoped>
.couche {
  display: flex;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.5);
}

.contenu {
  background: white;
  padding: 2rem;
  border-radius: 8px;
  min-width: 300px;
}

.actions {
  display: flex;
  margin-top: 1rem;
  justify-content: flex-end;
  gap: 1rem;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
