<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        
        <form @submit.prevent="submit">
            <div>
                <TextInputField
                    id="email"
                    type="email"
                    placeholder="your email"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>

            <div class="mt-4">
                
                <TextInputField
                    id="password"
                    type="password"
                    placeholder="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

                
            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>
                <template v-if="Object.keys(error).length > 0">
                    <div class="text-red-600" v-for="(item, index) in error" :key="index">
                        {{ item }}
                    </div>
                </template>
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<script>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInputField from '@/Components/TextInputField.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

export default {
    components:{
        Checkbox,
        GuestLayout, 
        InputError,
        PrimaryButton,
        TextInputField,
    },
    props:{
        canResetPassword: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    },
    data() {
        return {
            form:useForm({
                email: '',
                password: '',
                remember: false,
            }),
            error:{}
        }
    },
    methods: {
        submit(){
            this.form.post(route('login'), {
                onError:(error)=>{
                    this.error = error
                },
                onFinish: () => this.form.reset('password'),
            });
        }
    },
}
</script>