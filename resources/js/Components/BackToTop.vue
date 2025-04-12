<script setup lang="ts">
//const { showBackTop, scrollToTop } = useBackToTop();
</script>

<template>
  <button
      id="back-top"
      class="back-to-top"
      :class="{show: true}"
      @click="scrollToTop"
  >
    <i class="fa-solid fa-chevron-up"></i>
  </button>
</template>

<style scoped>

</style>