<template>
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Project</h1>
    <Link :href="`/admin/projects/create`" class="bg-blue-600 text-white px-4 py-2 rounded">+ New Project</Link>
    <p class="mt-4 text-gray-600">List view will go here...</p>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
