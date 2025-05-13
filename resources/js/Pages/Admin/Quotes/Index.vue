<template>
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Quotes</h1>
    <Link href="/admin/quotes/create" class="bg-blue-600 text-white px-4 py-2 rounded">+ New Quote</Link>
    <table class="w-full mt-4 table-auto border">
      <thead>
        <tr class="bg-gray-100">
          <th class="p-2 text-left">Customer</th>
          <th class="p-2 text-left">Estimate</th>
          <th class="p-2 text-left">Status</th>
          <th class="p-2 text-left">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="quote in quotes" :key="quote.id" class="border-t">
          <td class="p-2">{{ quote.contact_us_message?.name }}</td>
          <td class="p-2">${{ quote.price_estimate }}</td>
          <td class="p-2 capitalize">{{ quote.status }}</td>
          <td class="p-2">
            <Link :href="`/admin/quotes/${quote.id}/edit`" class="text-blue-600 underline">Edit</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
defineProps({ quotes: Array })
import { Link } from '@inertiajs/vue3'
</script>
