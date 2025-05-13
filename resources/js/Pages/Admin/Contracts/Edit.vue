<template>
  <div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Contract</h1>
    <form @submit.prevent="submit" class="space-y-4">
      <p class="text-gray-500">Form fields for editing contract go here...</p>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps({ contract: Object })

const form = useForm({
  // bind form fields to props.contract
})

function submit() {
  form.put(`/admin/contracts/${props.contract.id}`)
}
</script>
