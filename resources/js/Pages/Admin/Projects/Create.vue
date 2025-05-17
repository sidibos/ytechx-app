<template>
  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projects / Create
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-xl mx-auto p-6">
          <h1 class="text-2xl font-bold mb-4">Create Project</h1>
          
          <form @submit.prevent="submit" class="space-y-4">
            <div>
              <label class="block mb-1 text-sm">Title</label>
              <input v-model="form.title" type="text" class="w-full border p-2 rounded" />
              <p class="text-red-500 text-sm" v-if="form.errors.title">{{ form.errors.title }}</p>
            </div>

            <div>
              <label class="block mb-1 text-sm">Customer</label>
              <select v-model="form.customer_id" class="w-full border p-2 rounded">
                <option value="">Select Customer</option>
                <option v-for="customer in customers" :key="customer.id" :value="customer.id">
                  {{ customer.name }}
                </option>
              </select>
              <p class="text-red-500 text-sm" v-if="form.errors.customer_id">{{ form.errors.customer_id }}</p>
            </div>

            <div>
              <label class="block mb-1 text-sm">Quote</label>
              <select v-model="form.quote_id" class="w-full border p-2 rounded">
                <option value="">Select Approved Quote</option>
                <option v-for="quote in quotes" :key="quote.id" :value="quote.id">
                  Quote #{{ quote.id }}
                </option>
              </select>
              <p class="text-red-500 text-sm" v-if="form.errors.quote_id">{{ form.errors.quote_id }}</p>
            </div>

            <div>
              <label class="block mb-1 text-sm">Status</label>
              <select v-model="form.status" class="w-full border p-2 rounded">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
              </select>
              <p class="text-red-500 text-sm" v-if="form.errors.status">{{ form.errors.status }}</p>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Project</button>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps({
  customers: Array,
  quotes: Array,
})

const form = useForm({
  title: '',
  customer_id: '',
  quote_id: '',
  status: 'pending',
})


function submit() {
  form.post('/admin/projects')
}
</script>
