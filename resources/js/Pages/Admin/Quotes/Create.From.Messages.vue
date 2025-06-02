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
                    <label class="block mb-1">Contact Message</label>
                    <select 
                    v-model="form.contact_us_message_id" 
                    class="input border p-2 w-full" 
                    @change="onMessageSelected"
                    required>
                        <option value="">Select Contact Message</option>
                        <option v-for="message in props.prefillMessages" :key="message.id" :value="message.id">
                          {{ message.title }} - {{ message.email }}
                        </option>
                    </select>
                    <p v-if="form.errors.contact_us_message_id" class="text-red-500 text-sm">{{ form.errors.contact_us_message_id }}</p>
                  </div>
                  <div>
                    <label class="block mb-1">Price Estimate</label>
                    <input v-model="form.price_estimate" type="number" step="0.01" class="input" required />
                  </div>
                  <div>
                    <label class="block mb-1">Status</label>
                    <select 
                    v-model="form.status" 
                    class="input border p-2 w-full" 
                    required>
                      <option value="pending">Pending</option>
                      <option value="approved">Approved</option>
                      <option value="rejected">Rejected</option>
                    </select>
                  </div>
                  <div>
                    <label class="block mb-1">Notes</label>
                    <textarea 
                    v-model="form.notes" 
                    class="input border p-2 w-full" 
                    rows='4'
                    required></textarea>
                  </div>
                  <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">Save</button>
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
    prefillMessages: Object
  })
  
  const form = useForm({
    contact_us_message_id: '',
    price_estimate: 0,
    status: 'pending',
    notes: '',
  })
  
  const submit = () => {
    form.post('/admin/quotes')
  }

  function onMessageSelected() {
    // Update notes when a contact message is selected
    form.notes = props.prefillMessages.find(msg => msg.id === form.contact_us_message_id)?.message || '';
  };
  </script>
  