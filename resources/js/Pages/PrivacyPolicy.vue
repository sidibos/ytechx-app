<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    policy: String,
});
</script>

<template>
    <Head title="Privacy Policy" />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AuthenticationCardLogo />
                </div>
                <div class="max-w-4xl mx-auto px-4 py-12">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">🔐 Privacy Policy</h1>
                    <p class="text-sm text-gray-500 mb-4">Effective Date: April 12, 2025</p>

                    <section class="space-y-4">
                    <p>Your privacy is important to us. At <strong>YTechX</strong>, we are committed to protecting the personal information you share with us.</p>

                    <h2 class="text-xl font-semibold mt-6">Information We Collect</h2>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>Contact information sidibemousse@hotmail.com</li>
                        <li>Project details or messages you send us</li>
                        <li>Usage data (via cookies, analytics)</li>
                    </ul>

                    <h2 class="text-xl font-semibold mt-6">How We Use Your Data</h2>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>To respond to inquiries</li>
                        <li>To improve our website and services</li>
                        <li>To communicate updates and promotions (only if subscribed)</li>
                    </ul>

                    <h2 class="text-xl font-semibold mt-6">Third-Party Sharing</h2>
                    <p>We do not sell or share your data with third parties, except for services that help us run our business (e.g., hosting, analytics), and only under strict confidentiality.</p>

                    <h2 class="text-xl font-semibold mt-6">Data Security</h2>
                    <p>We implement standard security protocols and encryption practices to protect your data.</p>

                    <h2 class="text-xl font-semibold mt-6">Your Rights</h2>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>Request access to your data</li>
                        <li>Ask for your data to be updated or deleted</li>
                        <li>Opt out of marketing at any time</li>
                    </ul>

                    <p class="mt-4">Contact: <a href="mailto:sidibemousse@hotmail.com" class="text-blue-600 underline">sidibemousse@hotmail.com</a></p>
                    </section>
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose" v-html="policy" />
            </div>
        </div>
    </div>
</template>
