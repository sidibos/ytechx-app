<template>
  <div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Quote</h1>
    <form @submit.prevent="submit" class="space-y-4">
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
      <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Update</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps({ quote: Object })

const form = useForm({
  price_estimate: props.quote.price_estimate,
  status: props.quote.status,
  notes: props.quote.notes || '',
})

const submit = () => {
  form.put(`/admin/quotes/${props.quote.id}`)
}
</script>
