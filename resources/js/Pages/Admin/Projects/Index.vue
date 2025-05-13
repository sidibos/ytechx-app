<template>
  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projects
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-xl sm:rounded-lg">
            <div class="max-w-6xl mx-auto p-6">
              <h1 class="text-2xl font-bold mb-6">Project</h1>
              <Link :href="`/admin/projects/create`" class="bg-blue-600 text-white px-4 py-2 rounded">+ New Project</Link>
              <p class="mt-4 text-gray-600">List view will go here...</p>
            </div>
          </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
