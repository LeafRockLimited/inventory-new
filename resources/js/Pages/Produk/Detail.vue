<template>
     <Head title="Produk" />
    <AuthenticatedLayout>
        <div class="grid grid-cols-1 gap-6">
            <div class="navbar px-6 xl:px-28 flex flex-col justify-center items-start py-2 space-y-6">
                <p class="text-lg">Product Data</p>
                <Link 
                    class="text-sm text-custom-red inline-flex"
                    :href="route('product.index')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z"/></svg>
                        <span>produk</span>
                </Link>

               <!-- Product detail -->
                <div class="w-full mb-8 p-4 card bg-white
                grid grid-flow-row grid-cols-2 gap-4 items-start">
                    <div class="">
                        <div class="carousel carousel-center rounded-box">
                            <div v-for="(item, index) in produk.image" :key="index" class="carousel-item">
                                <img class=" w-96" :src="item.image_path" alt="Image" />
                            </div>
                        </div>
                    </div>
                    <div class=" w-full grid grid-cols-1 gap-4">
                        <div>
                            <p class="text-xl font-bold">Nama</p>
                            <span class="text-gray-400">Kategori</span>
                        </div>
                        <p>
                            Keterangan, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae deserunt debitis repellendus ratione cupiditate sequi, non nihil accusantium assumenda libero itaque. Voluptatem mollitia fugit eveniet exercitationem numquam suscipit sit ut quas assumenda facilis. At, nulla alias. Voluptatem perspiciatis tempora voluptas deleniti at, esse error blanditiis hic nam! Esse, et sunt. 
                        </p>
                        <div class=" min-w-80 px-2 py-4">
                            <small>Harga asli</small>
                            <p>{{ formatNumber(produk.sku.harga_beli) }}</p>
                        </div>
                        <div class="card bg-lime-300 font-semibold w-fit min-w-80 px-2 py-4">
                            <small>Harga jual</small>
                            <p>{{ formatNumber(produk.sku.harga_jual) }}</p>
                        </div>
                    </div>
                </div>
                <!-- end Product detail -->


                <div class="w-full mb-8 grid grid-flow-row grid-cols-4 gap-4">
                    <IconCardComponent 
                        :width="1">
                    
                        <template v-slot:body>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-cyan-300" viewBox="0 0 24 24"><path fill="currentColor" d="M11 21H3V3h8zm2-10V3h8v8zm0 10v-8h8v8z"/></svg>
                            </div>
                            <div class="grid grid-cols-1 w-full">
                                <span class="text-neutral-400">Stok produk</span>
                                <span class="text-xl font-semibold">0</span>
                                <button class="btn btn-sm float-right mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 13v3q0 .425.288.713T12 17q.425 0 .713-.288T13 16v-3h3q.425 0 .713-.288T17 12q0-.425-.288-.712T16 11h-3V8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8v3H8q-.425 0-.712.288T7 12q0 .425.288.713T8 13zm1 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22"/></svg>
                                    <span>Tambah</span>
                                </button>
                            </div>
                        </template>

                    </IconCardComponent>
                    <IconCardComponent>
                        <template v-slot:body>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-orange-400" viewBox="0 0 24 24"><path fill="currentColor" d="m21 16l-7.775-6.075q-.675-.525-1.512-.413t-1.338.813l-2.15 2.95q-.25.35-.663.413t-.762-.213L3 10.5V9q0-.625.55-.9t1.05.1L7 10l3.775-5.275q.5-.7 1.35-.825t1.525.425L17 7h2q.825 0 1.413.588T21 9zM3 20v-7l3.375 2.7q.675.55 1.513.425t1.337-.825l2.175-2.975q.25-.35.663-.412t.762.212l8.175 6.4V20z"/></svg>
                            </div>
                            <div class="grid grid-cols-1 w-full">
                                <span class="text-neutral-400">Riwayat transaksi</span>
                                <button class="btn btn-sm ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 19H8q-.825 0-1.412-.587T6 17V3q0-.825.588-1.412T8 1h6.175q.4 0 .763.15t.637.425l4.85 4.85q.275.275.425.638t.15.762V17q0 .825-.587 1.413T19 19m0-11l-5-5v3.5q0 .625.438 1.063T15.5 8zM4 23q-.825 0-1.412-.587T2 21V8q0-.425.288-.712T3 7q.425 0 .713.288T4 8v13h10q.425 0 .713.288T15 22q0 .425-.288.713T14 23z"/></svg>
                                    <span class="">Cek</span>
                                </button>
                            </div>
                        </template>
                    </IconCardComponent>
                    <!-- <IconCardComponent /> -->
                    <!-- <IconCardComponent /> -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Formatter from '@/Service/formatter';
import { Head, Link } from '@inertiajs/vue3';
import IconCardComponent from '@/Components/IconCardComponent.vue';

export default {
    components:{
        Head,AuthenticatedLayout,Link,IconCardComponent
    },
    props:{
        produk:Object
    },
    methods: {
        formatNumber(value) {
            return Formatter.idr(value);
        }
    },
}
</script>