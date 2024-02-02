
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Dashboard</h2>
        </template>

        <div class="grid grid-flow-row grid-cols-4 gap-8 p-16">
            <MenuCard bg-color="bg-blue-600">
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
                    <Link :href="route('user.index')">
                        Menuju halaman
                    </Link>
                </template>
            </MenuCard>
            <MenuCard bg-color="bg-rose-600">
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
                    <Link :href="route('product.index')" >
                        Menuju halaman
                    </Link>
                </template>
            </MenuCard>
            <MenuCard bg-color=" bg-white-600">
                <template v-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="m12 5.15l-8 3.2V19h2v-6q0-.825.588-1.412T8 11h8q.825 0 1.413.588T18 13v6h2V8.35zM2 19V8.35q0-.625.338-1.125T3.25 6.5l8-3.2q.35-.15.75-.15t.75.15l8 3.2q.575.225.913.725T22 8.35V19q0 .825-.587 1.413T20 21h-4v-8H8v8H4q-.825 0-1.412-.587T2 19m7 2v-2h2v2zm2-3v-2h2v2zm2 3v-2h2v2zM8 11h8z"/></svg>
                </template>
                <template v-slot:title>
                    <span class="text-neutral-600">
                        Gudang
                    </span>
                </template>
                <template v-slot:link >
                    <Link :href="route('gudang.index')" >
                        Menuju halaman
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