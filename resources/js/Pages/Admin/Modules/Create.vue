<template>
  <div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Module</h1>
    <form @submit.prevent="submit" class="space-y-4">
      <p class="text-gray-500">Form fields for creating module go here...</p>
      <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  // define fields here
})

function submit() {
  form.post('/admin/modules')
}
</script>
