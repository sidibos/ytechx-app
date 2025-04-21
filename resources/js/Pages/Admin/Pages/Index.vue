<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Pages</h1>
      <Link href="/admin/pages/create" class="text-blue-600">+ New Page</Link>
      <ul class="mt-4 space-y-2">
        <li v-for="page in pages" :key="page.id" class="p-4 bg-white shadow rounded">
          <h2 class="font-semibold">{{ page.title }}</h2>
          <p class="text-sm text-gray-500">{{ page.slug }}</p>
          <Link :href="`/admin/pages/${page.id}/edit`" class="text-blue-500 text-sm">Edit</Link>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  defineProps({ pages: Array })
  import { Link } from '@inertiajs/vue3'
  </script>
  