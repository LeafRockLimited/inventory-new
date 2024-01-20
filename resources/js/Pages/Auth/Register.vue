<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInputField from '@/Components/TextInputField.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInputField
                    id="name"
                    type="text"
                    placeholder="your name"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="na,e"
                />
                

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                
                <TextInputField
                    id="email"
                    type="email"
                    placeholder="your email"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInputField
                    id="password"
                    type="password"
                    placeholder="your password"
                    v-model="form.password"
                    required
                    autofocus
                    autocomplete="password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                
                <TextInputField
                    id="password_confi"
                    type="password"
                    placeholder="confirm password"
                    v-model="form.password_confirmation"
                    required
                    autofocus
                    autocomplete="new-password"
                />
               

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
