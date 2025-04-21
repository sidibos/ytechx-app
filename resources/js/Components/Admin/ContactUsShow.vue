<template>
    <div class="max-w-xl mx-auto py-10">
      <h1 class="text-2xl font-bold mb-6">View / Edit Message</h1>
  
      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="block mb-1 font-medium">Name</label>
          <input v-model="form.name" class="input border p-2 w-full" type="text" />
          <p v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</p>
        </div>
  
        <div>
          <label class="block mb-1 font-medium">Email</label>
          <input v-model="form.email" class="input border p-2 w-full" type="email" />
          <p v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</p>
        </div>

        <div>
          <label class="block mb-1 font-medium">Phone</label>
          <input v-model="form.phone" class="input border p-2 w-full" type="text" />
          <p v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</p>
        </div>

        <!-- Status Field -->
        <div>
            <label class="block font-medium mb-1">Status</label>
            <select v-model="form.status" class="input">
                <option value="new">New</option>
                <option value="viewed">Viewed</option>
            </select>
        </div>

        <!-- Budget Field -->
        <div>
            <label class="block font-medium mb-1">Budget</label>
            <input v-model="form.budget" class="input" type="number" step="0.01" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Title</label>
            <input v-model="form.title" type="text" class="w-full border rounded p-2" />
            <span v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</span>
        </div>
  
        <div>
          <label class="block mb-1 font-medium">Message</label>
          <textarea v-model="form.message" class="input h-32 border p-2 w-full"></textarea>
          <p v-if="form.errors.message" class="text-red-500 text-sm">{{ form.errors.message }}</p>
        </div>
  
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
          Save Changes
        </button>
  
        <p v-if="$page.props.flash.success" class="text-green-600 mt-4">{{ $page.props.flash.success }}</p>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3'
  
  const props = defineProps({ message: Object })
  
  const form = useForm({
    title: props.message.title,
    name: props.message.name,
    email: props.message.email,
    phone: props.message.phone,
    status: props.message.status,
    budget: props.message.budget,
    message: props.message.message
  })
  
  const submit = () => {
    form.put(route('admin.contacts.update', props.message.id))
  }
  </script>
<!--   
  <style scoped>
  .input {
    @apply w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300;
  }
  </style> -->
  