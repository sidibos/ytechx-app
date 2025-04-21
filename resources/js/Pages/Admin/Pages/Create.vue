<template>
    <div class="p-6">
      <h1 class="text-2xl font-bold mb-4">Create Page</h1>
      <PageForm :form="form" :submit="submit" submit-label="Create Page" />
    </div>
</template>
  
<script setup>
  import { useForm } from '@inertiajs/vue3'
  import PageForm from './Form.vue'
  
  const form = useForm({
    title: '',
    slug: '',
    content: ''
  })
  
  function submit() {
    form.post(route('admin.pages.store'))
  }
</script>
  