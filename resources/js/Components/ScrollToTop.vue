<template>
    <button
      v-show="showButton"
      @click="scrollToTop"
      class="fixed bottom-6 right-6 z-50 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full shadow-lg transition-all"
    >
      ↑ Top
    </button>
</template>
  
<script setup>
  import { ref, onMounted, onUnmounted } from 'vue'
  
  const showButton = ref(false)
  
  const handleScroll = () => {
    showButton.value = window.scrollY > 300
  }
  
  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' })
  }
  
  onMounted(() => {
    window.addEventListener('scroll', handleScroll)
  })
  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
  })
  </script>
  