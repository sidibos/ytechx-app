<template>
    <div class="p-6">
      <h1 class="text-2xl font-bold mb-4">Edit Page</h1>
      <PageForm :form="form" :submit="submit" submit-label="Update Page" />
    </div>
</template>
  
<script setup>
  import { useForm } from '@inertiajs/vue3'
  import PageForm from './Form.vue'
  import { defineProps } from 'vue'
  
  const props = defineProps({ page: Object })
  
  const form = useForm({
    title: props.page.title,
    slug: props.page.slug,
    content: props.page.content,
  })
  
  function submit() {
    form.put(route('admin.pages.update', props.page.id))
  }
</script>
  