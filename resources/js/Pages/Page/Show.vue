<template>
    <div class="max-w-3xl mx-auto p-6">
      <h1 class="text-3xl font-bold mb-4">{{ page.title }}</h1>
      <div class="prose" v-html="page.content" />
    </div>
</template>
  
<script setup>
 defineProps({ page: Object })
</script>
  