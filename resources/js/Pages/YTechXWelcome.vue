<script setup>
import AppLayout from '@/Layouts/AppGuessLayout.vue';
import YtechXWelcome from '@/Components/YTechXWelcome.vue';
// import DefaultLayout from '@/Layouts/defaultLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard" currentPage="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <YtechXWelcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
