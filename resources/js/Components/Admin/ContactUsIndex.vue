<template>
    <div class="max-w-5xl mx-auto py-10">
      <h1 class="text-2xl font-bold mb-6">Contact Messages</h1>
  
      <table class="w-full table-auto border">
        <thead>
          <tr class="bg-gray-100 text-left">
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Phone</th>
            <th class="p-3">Title</th>
            <th class="p-3">Status</th>
            <th class="p-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="msg in messages.data" :key="msg.id" class="border-t">
            <td class="p-3">{{ msg.name }}</td>
            <td class="p-3">{{ msg.email }}</td>
            <td class="p-3">{{ msg.phone }}</td>
            <td class="p-3 truncate max-w-xs">{{ msg.title }}</td>
            <td class="p-3">{{ msg.status }}</td>
            <td class="p-3">
              <Link 
              :href="route('admin.contacts.show', msg.id)" 
              class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition">
                View / Edit
              </Link>
              |
              <Link 
              :href="`/admin/quotes/create-from-message/${msg.id}`" 
              
              class="inline-block bg-green-500 hover:bg-green-700 text-white font-medium px-4 py-2 rounded transition"
              >
                Create Quote
              </Link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script setup>
  defineProps({ messages: Object })
  import { Link } from '@inertiajs/vue3'
  </script>