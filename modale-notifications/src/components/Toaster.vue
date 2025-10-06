<script setup lang="ts">
import Toast from '@/components/Toast.vue'
</script>



<template>
  <div class="toaster">
    <TransitionGroup tag="div" name="slide">
      <Toast>
      </Toast>
    </TransitionGroup>
  </div>
</template>



<style scoped>
.toaster {
  position: fixed;
  bottom: 1rem;
  right: 1rem;
  z-index: 9999;
}

.slide-move, .slide-enter-active, .slide-leave-active {
  transition: all 0.5s ease;
}

.slide-enter-from, .slide-leave-to {
  transform: translateX(400px);
}
</style>
