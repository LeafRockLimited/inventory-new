<template>
    <Head title="Produk" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-custom-red leading-tight">
                Produk
            </h2>
        </template>
        <div class="w-full flex flex-row ">
            <div class="w-full px-6 xl:px-28" >
                <p class="text-2xl font-medium text-rose-700 dark:text-white">Manajemen Produk</p>
                <div class="user-table border dark:border-none p-4 rounded 
                bg-white my-4 dark:bg-custom-black">
                <div class="w-full mb-8 flex flex-row justify-end">
                    <Link :href="route('product.create')">
                        <PrimaryButton class="space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11 13v3q0 .425.288.713T12 17q.425 0 .713-.288T13 16v-3h3q.425 0 .713-.288T17 12q0-.425-.288-.712T16 11h-3V8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8v3H8q-.425 0-.712.288T7 12q0 .425.288.713T8 13zm1 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/>
                            </svg>
                            <span>Tambah produk</span>
                        </PrimaryButton>
                    </Link>
                </div>

                   <TableVue 
                    :columns="columns" 
                    :total-data="produkData.total_data"
                    :data="produkData?.data??[]"
                    :length="lengthData"
                    :search="search"
                    :links="produkData.links"
                    @update:length="(item) => {lengthData = item}"
                    @update:search="(item) => {search = item}" 
                    @update:page="(item) => {pageUrl = item}"
                    @update:colSort="(item) => {sortCol = item}"
                   >
                   </TableVue>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableVue from '@/Components/Table.vue'
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import axios from 'axios';
import { debounce } from 'vue-debounce'
import moment from 'moment'
import formatter from '@/Service/formatter';

export default {
    components:{
        AuthenticatedLayout,
        Head,
        Link,
        TableVue,
        PrimaryButton
    },
    computed: {
        localStorageTheme(){
            return localStorage.getItem('theme');
        }
    },
    data() {
        return {
            themeData:null,
            columns:['No.','Nama','Reg','Label','Harga beli','Harga jual','Keterangan', 'Tanggal registrasi'],
            produkData: [],
            lengthData: 10,
            search:null,
            pageUrl:null,
            sortCol:null,
        }
    },
    created() {
        this.themeData = this.localStorageTheme
    },
    watch: {
        lengthData(){
            this.fetchDataProduk();
        },
        search(newValue){
            this.fetchDataProduk();
        },
        pageUrl(){
            this.fetchDataProduk();
        },
        sortCol(newVal, oldVal){
            this.fetchDataProduk();
        }
    },
    computed: {
         
    },
    async mounted() {
        this.fetchDataProduk();
    },
    methods: {
         fetchDataProduk: debounce(async function() {

            const url = this.pageUrl??route('product.data');
            const response = await axios.get(
                url,
                {
                    params:{
                        length:this.lengthData,
                        search: this.search,
                        col:this.sortCol?.col??1,
                        dir:this.sortCol?.dir??'asc'
                    }
                }
            )
            .then((result) => {
                return result.data
            }).catch((err) => {
                console.log(err)
            });

            const data = response.data.map((item, index) => {
                return [
                    {
                        item: response.from++
                    },
                    {
                        item: item.nama,
                    },
                    {
                        item: item.reg,
                    },
                    {
                        item: item.label??null,
                    },
                    {
                        item: formatter.idr(item.harga_beli),
                    },
                    {
                        item: formatter.idr(item.harga_jual)
                    },
                    {
                        item: item.keterangan,
                    },
                    {
                        item: `<span class="text-sm">${moment(item.created_at).locale('fr').format('d MMMM y, h:mm:ss a')}</span>`
                    },
                ]
            });
            console.log(response);

            this.produkData = {
                data:data,
                total_data :response.total,
                links: response.links,          
            }
        },300)
    },
}
</script>