<template>
  <div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Quote</h1>
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block mb-1">Contact Message ID</label>
        <input v-model="form.contact_us_message_id" type="number" class="input" />
      </div>
      <div>
        <label class="block mb-1">Price Estimate</label>
        <input v-model="form.price_estimate" type="number" step="0.01" class="input" />
      </div>
      <div>
        <label class="block mb-1">Status</label>
        <select v-model="form.status" class="input">
          <option value="pending">Pending</option>
          <option value="approved">Approved</option>
          <option value="rejected">Rejected</option>
        </select>
      </div>
      <div>
        <label class="block mb-1">Notes</label>
        <textarea v-model="form.notes" class="input"></textarea>
      </div>
      <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">Save</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  contact_us_message_id: '',
  price_estimate: '',
  status: 'pending',
  notes: '',
})

const submit = () => {
  form.post('/admin/quotes')
}
</script>
