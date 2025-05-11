<template>
    <div class="max-w-2xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Let's Work Together</h1>
        <p class="mb-6">We would love to hear from you! Please fill out the form below.</p>
        <form @submit.prevent="submitForm" class="space-y-4">
            <div>
                <label>Name</label>
                <input v-model="form.name" type="text" class="border p-2 w-full" />
                <p v-if="errors.name" class="text-red-500">{{ errors.name[0] }}</p>
            </div>
        
            <div>
                <label>Email</label>
                <input v-model="form.email" type="email" class="border p-2 w-full" />
                <p v-if="errors.email" class="text-red-500">{{ errors.email[0] }}</p>
            </div>

            <div>
                <label>Phone</label>
                <input v-model="form.phone" type="text" class="border p-2 w-full" />
                <p v-if="errors.phone" class="text-red-500">{{ errors.phone[0] }}</p>
            </div>

            <!-- Budget Field -->
            <div>
                <label class="block font-medium mb-1">Budget</label>
                <input v-model="form.budget" class="input" type="number" step="0" />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium">Title</label>
              <input v-model="form.title" type="text" class="w-full border rounded p-2" />
              <span v-if="errors.title" class="text-red-500 text-sm">{{ errors.title }}</span>
            </div>
        
            <div>
                <label>Message</label>
                <textarea v-model="form.message" class="border h-36 p-2 w-full"></textarea>
                <p v-if="errors.message" class="text-red-500">{{ errors.message[0] }}</p>
            </div>

            <!-- 👻 Honeypot field (hidden from users) -->
            <div style="display: none;">
              <label>Leave this field blank</label>
              <input type="text" v-model="form.honeypot" autocomplete="off" />
            </div>
        
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
              Send Message
            </button>
            <p v-if="successMessage" class="text-green-500 mt-2">{{ successMessage }}</p>
            <p v-if="$page.props.flash.success" class="text-green-600 mt-4">{{ $page.props.flash.success }}</p>

        </form>
    </div>
  </template>
  
  <script setup>
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import { ref } from 'vue'
  import axios from 'axios'
  
  const form = ref({
    title: '',
    name: '',
    email: '',
    phone: '',
    budget: 0,
    message: '',
    honeypot: '' // 👈 Add honeypot field
  })
  
  const errors = ref({})
  const successMessage = ref('')
  
  const submitForm = async () => {
    errors.value = {}
    successMessage.value = ''
  
    try {
      const response = await axios.post('/api/contact-us', form.value)
      successMessage.value = response.data.message
  
      // Reset the form
      form.value = { 
        name: '', 
        email: '', 
        phone: '',
        budget: '',  
        title: '', 
        message: '',
        honeypot: '' // 👈 Add honeypot field
      }
    } catch (error) {
      if (error.response?.status === 422) {
        errors.value = error.response.data.errors
      }
    }
  }
  </script>
