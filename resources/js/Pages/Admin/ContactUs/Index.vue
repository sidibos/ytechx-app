<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ContactUsIndex from '@/Components/Admin/ContactUsIndex.vue';

defineProps({
  messages: Object
})

</script>

<template>
    <AppLayout title="Dashboard" currentPage="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact Messages
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ContactUsIndex :messages="messages" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>