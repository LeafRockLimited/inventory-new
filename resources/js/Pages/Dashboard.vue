
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Dashboard</h2>
        </template>

        <div class="grid grid-flow-row grid-cols-4 gap-4 p-16">
            <MenuCard bg-color="bg-blue-500">
                <template v-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" text-blue-400">
                        <circle cx="12" cy="6" r="4" fill="currentColor" />
                        <path fill="currentColor"
                            d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" />
                    </svg>
                </template>
                <template v-slot:title>
                    <span>
                        Manajemen User
                    </span>
                </template>
                <template v-slot:link>
                    <Link :href="route('user.index')" class="bg-white p-2 rounded text-blue-500">
                    <span class=" inline-flex">
                        Menuju halaman
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 50 50">
                            <path fill="currentColor"
                                d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17s-7.6 17-17 17m0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15s15-6.7 15-15s-6.7-15-15-15" />
                            <path fill="currentColor" d="m24.7 34.7l-1.4-1.4l8.3-8.3l-8.3-8.3l1.4-1.4l9.7 9.7z" />
                            <path fill="currentColor" d="M16 24h17v2H16z" />
                        </svg>
                    </span>
                    </Link>
                </template>
            </MenuCard>
            <MenuCard bg-color="bg-red-500">
                <template v-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg"  class=" text-red-400" viewBox="0 0 2048 2048">
                        <path fill="currentColor"
                            d="m1344 2l704 352v785l-128-64V497l-512 256v258l-128 64V753L768 497v227l-128-64V354zm0 640l177-89l-463-265l-211 106zm315-157l182-91l-497-249l-149 75zm-507 654l-128 64v-1l-384 192v455l384-193v144l-448 224L0 1735v-676l576-288l576 288zm-640 710v-455l-384-192v454zm64-566l369-184l-369-185l-369 185zm576-1l448-224l448 224v527l-448 224l-448-224zm384 576v-305l-256-128v305zm384-128v-305l-256 128v305zm-320-288l241-121l-241-120l-241 120z" />
                    </svg>
                </template>
                <template v-slot:title>
                    <span>
                        Produk
                    </span>
                </template>
                <template v-slot:link>
                    <Link :href="route('product.index')" class="bg-white p-2 rounded text-blue-500">
                    <span class=" inline-flex">
                        Menuju halaman
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 50 50">
                            <path fill="currentColor"
                                d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17s-7.6 17-17 17m0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15s15-6.7 15-15s-6.7-15-15-15" />
                            <path fill="currentColor" d="m24.7 34.7l-1.4-1.4l8.3-8.3l-8.3-8.3l1.4-1.4l9.7 9.7z" />
                            <path fill="currentColor" d="M16 24h17v2H16z" />
                        </svg>
                    </span>
                    </Link>
                </template>
            </MenuCard>
        </div>
    </AuthenticatedLayout>
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import MenuCard from '@/Components/MenuCard.vue';

export default {
    components: {
        AuthenticatedLayout,
        Head,
        MenuCard,
        Link
    }
}
</script>