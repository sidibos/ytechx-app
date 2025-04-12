<script setup lang="ts">
//const settingStore = useSettingStore();
</script>

<template>
  <div class="popup-search-box d-none d-lg-block" :class="{show: true}">
    <button class="searchClose" @click="settingStore.closeSearchModal"><i class="fal fa-times"></i></button>
    <form action="#">
      <input type="text" placeholder="What are you looking for?">
      <button type="submit"><i class="fal fa-search"></i></button>
    </form>
  </div>
</template>

<style scoped>

</style>