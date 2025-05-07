<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import YTechXAppLogo from '@/Components/YTechXAppLogo.vue';
import { reactive } from 'vue'
import ContactUs from '@/Components/ContactUs.vue';
import { services } from '@/data/services';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  message: ''
})

const submit = () => {
  form.post(route('contact.store')) // Ensure this route exists in Laravel
}
</script>

<template>
    <div>
        <!-- Hero -->
        <section
                class="relative bg-cover bg-center bg-no-repeat py-32 text-white text-center"
                style="background-image: url('/images/tech-hero-bg-3.jpg');"
            >
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                <div class="relative z-10 max-w-2xl mx-auto px-4">
                    <h1 class="text-4xl font-bold mb-4">We Are Your Tech eXperts!</h1>
                    <h3 class="text-2xl font-bold mb-4">We Craft Digital Experiences</h3>
                    <p class="text-lg mb-6">
                        From websites to full-scale platforms, we help brands thrive in the digital world.
                    </p>
                    <p class="text-lg mb-6">
                        Deliver your PHP/Python Projects, Effortlessly!
                    </p>
                    <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                    Get Started
                    </button>
                </div>
        </section>

        <!-- Services -->
        <section id="services" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <h3 class="text-3xl font-bold text-center mb-12">Our Services</h3>
                <div class="grid md:grid-cols-3 gap-10">
                <div 
                    v-for="(service, i) in services"
                    :key="i"
                    class="
                    bg-gradient-to-br from-indigo-50 to-white p-6 rounded-2xl shadow-md hover:shadow-lg transition duration-300 border border-indigo-100
                    "
                >
                    <h4 class="text-xl font-semibold mb-2">{{ service.title }}</h4>
                    <p class="text-gray-600">{{ service.description }}</p>
                </div>
                </div>
            </div>
        </section>

        <!-- About -->
        <section 
        id="about" 
        class="bg-gradient-to-br from-indigo-50 to-white py-20"
        >
            <div class="max-w-5xl mx-auto px-4 text-center">
                <h3 class="text-3xl font-bold mb-4">Who We Are</h3>
                <p class="text-gray-700 text-lg">
                    We’re a team of designers, developers, and strategists passionate about digital innovation.
                    We are a team of experienced developers who can help you with your PHP/Python projects. we can help you with your PHP/Python projects, whether it's a small project or a large project.
                </p>
            </div>
        </section>

        <!-- Portfolio -->
        <section 
        id="portfolio" 
        class="bg-blue-100 from-indigo-50 to-white py-20"
        >
            <div class="max-w-5xl mx-auto px-4 text-center">
                <h3 class="text-3xl font-bold mb-4">Our Work</h3>
                <p class="text-gray-700 text-lg">
                    We have worked with various clients to deliver high-quality digital solutions.
                    <br/>
                    My portfolio showcases my expertise and 16 years+ experience in web development, design, and digital strategy.
                </p>
                <p class="text-gray-700 text-lg">
                    <a href="https://sidibemoussa.com" target="_blank">Link to my profile</a> 
                </p>
            </div>
        </section>

        <!-- Portfolio -->
        <!-- <section id="portfolio" class="bg-white py-20">
            <div class="max-w-0xl mx-auto px-4">
                <h3 class="text-3xl font-bold text-center mb-12">Our Work</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        v-for="(project, i) in portfolio"
                        :key="i"
                        class="bg-indigo-50 rounded-xl shadow hover:shadow-lg overflow-hidden transition"
                    >
                        <img :src="project.image" :alt="project.title" class="w-full h-48 object-cover" />
                        <div class="p-4">
                            <p class="text-gray-500 text-sm mb-2">
                                I haver been working around the clock for various companies in the UK, working on many interesting projects.
                            </p>
                            <h4 class="text-lg font-semibold mb-1">{{ project.title }}</h4>
                            <p class="text-gray-600 text-sm">{{ project.description }}</p>
                            <a :href="project.link" class="text-indigo-600 hover:underline mt-2 inline-block">
                                View projects
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Contact -->
        <section id="contacts" class="py-15">
            <ContactUs />
        </section>
    </div>
</template>
