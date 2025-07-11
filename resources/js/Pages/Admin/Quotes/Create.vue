<template>
  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Quotes / Create
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-xl sm:rounded-lg">
            <div class="max-w-xl mx-auto p-6">
              <h1 class="text-2xl font-bold mb-4">Create Quote</h1>
              <form @submit.prevent="submit" class="space-y-4">
                <div>
                  <label class="block mb-1">Contact Message ID</label>
                  <input 
                  v-model="form.contact_us_message_id" 
                  type="number" 
                  class="input border p-2"
                  :readonly="!!props.prefillMessage" />
                  <p v-if="form.errors.contact_us_message_id" class="text-red-500 text-sm">{{ form.errors.contact_us_message_id }}</p>
                </div>
                <div>
                  <label class="block mb-1">Price Estimate</label>
                  <input v-model="form.price_estimate" type="number" step="0.01" class="input" />
                </div>
                <div>
                  <label class="block mb-1">Status</label>
                  <select v-model="form.status" class="input border p-2 w-full">
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-1">Notes</label>
                  <textarea v-model="form.notes" class="input border p-2 w-full"></textarea>
                </div>
                <button 
                class="bg-green-600 text-white px-4 py-2 rounded" 
                type="submit">Save</button>

                <button 
                class="bg-blue-200 text-blue-800 px-4 py-2 ml-4 rounded"
                type="button"
                @click="$inertia.visit('/admin/quotes')">Cancel</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  prefillMessage: Object
})

const form = useForm({
  contact_us_message_id: props.prefillMessage?.id || '',
  price_estimate: props.prefillMessage?.budget || 0,
  status: 'pending',
  notes: props.prefillMessage?.message || '',
})

const submit = () => {
  form.post('/admin/quotes')
}
</script>
