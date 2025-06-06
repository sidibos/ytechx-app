<template>
    <Head title="Register" />

    <!-- Success Message -->
    <!-- <div v-if="successMessage" class="bg-green-100 text-green-800 p-4 rounded mb-4">
        Registration successful! Welcome!
    </div> -->

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <label class="block text-sm font-medium">Register As</label>
                <select v-model="form.role" class="w-full border px-2 py-2 rounded">
                    <option value="customer">Customer</option>
                    <option value="tech_expert">Tech Expert</option>
                </select>
                <p v-if="form.errors.role" class="text-red-500 text-sm">{{ form.errors.role }}</p>
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ms-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
            <div v-if="successMessage" class="mt-4 w-full text-green-900 text-lg">
                {{ successMessage }}
            </div>
            <div v-if="form.errors.general_error" class="mt-4 w-full text-red-500 text-sm">
                {{ form.errors.general_error }}
            </div>
        </form>
    </AuthenticationCard>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref, defineProps } from 'vue';
import axios from 'axios';

const errors = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: '',
    terms: '',
    general_error: ''
});

const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'tech_expert',
    terms: false,
    // honeypot: '' // Uncomment if you want to use a honeypot field
    errors: errors
});

// const errors = ref({});
const successMessage = ref('');

defineProps({
    success: String,
    error: Boolean,
});

const submit = async () => {
    errors.value = {};
    //successMessage.value = ''
  
    try {
      const response = await axios.post('/api/register-expert', form.value)
      successMessage.value = response.data.message
        
      // Reset the form
      form.value = {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        role: 'tech_expert',
        terms: false,
        errors: errors,
        // honeypot: '' // Uncomment if you want to use a honeypot field
      }
    } catch (error) {
        if (error.response?.status === 422) {
            errors.value = error.response.data.errors
        } else {
            errors.value = { general_error: 'An unexpected error occurred. Please try again.' }
        }
    }
};
</script>
