<template>
    <div class="max-w-2xl mx-auto py-8">
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
        
            <div>
                <label>Message</label>
                <textarea v-model="form.message" class="border h-36 p-2 w-full"></textarea>
                <p v-if="errors.message" class="text-red-500">{{ errors.message[0] }}</p>
            </div>
        
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Send</button>
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
    name: '',
    email: '',
    phone: '',
    message: '',
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
      form.value = { name: '', email: '', phone: '', message: '' }
    } catch (error) {
      if (error.response?.status === 422) {
        errors.value = error.response.data.errors
      }
    }
  }
  </script>
