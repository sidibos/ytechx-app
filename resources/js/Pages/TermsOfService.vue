<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    terms: String,
});
</script>

<template>
    <Head title="Terms of Service" />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AuthenticationCardLogo />
                </div>

                <div class="max-w-4xl mx-auto px-4 py-12">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">📃 Terms of Service</h1>

                    <p class="mb-6 text-gray-700">By using this website, you agree to comply with the following terms.</p>

                    <section class="space-y-6 text-gray-700">
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Use of Website</h2>
                            <p>
                            You agree not to misuse our services or website in any way that harms
                            <strong>YTechX</strong>, its partners, or other users.
                            </p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold mb-2">Intellectual Property</h2>
                            <p>
                            All content on this site (text, design, code, etc.) is the property of
                            <strong>YTechX</strong> unless otherwise stated. You may not reproduce or
                            redistribute any materials without permission.
                            </p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold mb-2">Client Projects</h2>
                            <p>
                            Any work performed by <strong>YTechX</strong> is governed by specific
                            contracts and agreements outlining the scope, payment, timelines, and ownership.
                            </p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold mb-2">Limitation of Liability</h2>
                            <p>
                            We are not liable for damages resulting from the use of or inability to use our
                            website or services.
                            </p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold mb-2">🍪 Cookie Policy</h2>
                            <ul class="list-disc list-inside">
                            <li>Enhance user experience</li>
                            <li>Track analytics via tools like Google Analytics</li>
                            <li>Improve page speed and performance</li>
                            </ul>
                            <p class="mt-2">
                            You can choose to disable cookies via your browser settings.
                            </p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold mb-2">📫 Contact Information</h2>
                            <p><strong>YTechX</strong></p>
                            <p>Email: <a href="mailto:support@yourdomain.com" class="text-blue-600 underline">support@yourdomain.com</a></p>
                            <p>Address: Childers Street, London</p>
                        </div>
                    </section>
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose" v-html="terms" />
            </div>
        </div>
    </div>
</template>
