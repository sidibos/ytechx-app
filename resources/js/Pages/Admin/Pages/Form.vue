<template>
    <form @submit.prevent="submit" class="space-y-4 max-w-3xl mx-auto">
      <div>
        <label class="block text-sm font-medium">Title</label>
        <input v-model="form.title" type="text" class="w-full p-2 border rounded" />
        <p class="text-red-500 text-sm" v-if="form.errors.title">{{ form.errors.title }}</p>
      </div>
  
      <div>
        <label class="block text-sm font-medium">Slug</label>
        <input v-model="form.slug" type="text" class="w-full p-2 border rounded" />
        <p class="text-red-500 text-sm" v-if="form.errors.slug">{{ form.errors.slug }}</p>
      </div>
  
      <div>
        <label class="block text-sm font-medium">Content</label>
        <textarea v-model="form.content" rows="10" class="w-full p-2 border rounded"></textarea>
        <p class="text-red-500 text-sm" v-if="form.errors.content">{{ form.errors.content }}</p>
      </div>
  
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        {{ submitLabel }}
      </button>
    </form>
</template>
  
<script setup>
  defineProps({
    form: Object,
    submit: Function,
    submitLabel: String,
  });
</script>
  