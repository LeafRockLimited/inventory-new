<template>
    <Head title="Produk" />
    <AuthenticatedLayout>
        <div class="grid grid-cols-1 gap-6">
            <div class="navbar px-6 xl:px-28 flex flex-col justify-center items-start py-2 space-y-6">
            
            <!-- alert -->
            <div role="alert" v-if="messageAlert != null" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ messageAlert }}</span>
            </div>
            <!-- end alert -->
            <p class="text-lg">Product Data</p>
            <Link 
                class="text-sm text-custom-red inline-flex"
                :href="route('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z"/></svg>
                    <span>dashboard</span>
            </Link>
            </div>
            <div class="w-full flex flex-row ">
                <div class="w-full px-6 xl:px-28" >
                    <div class="bg-white p-4 rounded-lg shadow-xl">
                        <div class="w-full mb-8 flex flex-row justify-end">
                            <Link :href="route('product.create')">
                                <button class="inline-flex btn btn-primary shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M11 13v3q0 .425.288.713T12 17q.425 0 .713-.288T13 16v-3h3q.425 0 .713-.288T17 12q0-.425-.288-.712T16 11h-3V8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8v3H8q-.425 0-.712.288T7 12q0 .425.288.713T8 13zm1 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/>
                                    </svg>
                                    <span>Tambah produk</span>
                                </button>
                            </Link>
                        </div>
                        <div class="">

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
            </div>
        </div>
    </AuthenticatedLayout>
    <ModalDelete></ModalDelete>
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
import ModalDelete from '@/Components/ModalDelete.vue';

export default {
    components:{
        AuthenticatedLayout,
        Head,
        Link,
        TableVue,
        PrimaryButton,ModalDelete
    },
    computed: {
        localStorageTheme(){
            return localStorage.getItem('theme');
        }
    },
    data() {
        return {
            themeData:null,
            columns:['No.','Nama','Reg','Label','Status','Harga beli','Harga jual','Keterangan', 'Tanggal registrasi'],
            produkData: [],
            lengthData: 10,
            search:null,
            pageUrl:null,
            sortCol:null,
            messageAlert:null
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
                        item: item.nama+` <a href="${route('product.detail',item.id)}" class="btn btn-xs text-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16v-4q0-.425-.288-.712T12 11q-.425 0-.712.288T11 12v4q0 .425.288.713T12 17m0-8q.425 0 .713-.288T13 8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8q0 .425.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/></svg>
                                        </a >`,
                    },
                    {
                        item: item.reg,
                    },
                    {
                        item: item.label??null,
                    },
                    {
                        item: item.status,
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
                        item: `<span class="text-sm">${moment(item.created_at).locale('id').format('dddd, D MMMM y, h:mm:ss a')}</span>`
                    },
                    {
                        item: `<a href="${route('product.edit',item.id)}" class="btn btn-secondary btn-sm text-white">
                                Edit
                            </a>`,
                    },
                    {
                        item: `<buton class="btn bg-red-500 flex flex-row w-fit btn-sm text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zm5-7.1l1.9 1.9q.275.275.7.275t.7-.275q.275-.275.275-.7t-.275-.7l-1.9-1.9l1.9-1.9q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275L12 11.1l-1.9-1.9q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7l1.9 1.9l-1.9 1.9q-.275.275-.275.7t.275.7q.275.275.7.275t.7-.275z"/></svg>
                            </button>`,
                        function:() =>{
                            this.deleteHandler(item.id)
                        }
                    },
                    
                ]
            });
            this.produkData = {
                data:data,
                total_data :response.total,
                links: response.links,          
            }
        },300),
         async deleteHandler(id) {
            my_modal_1.showModal()
            // try {
            //     await axios.delete(route('product.delete',id))
            //     this.fetchDataProduk();
            //     this.messageAlert = 'Berhasil menghapus data'
            //     await new Promise(resolve => setTimeout(resolve, 3000));
            //     this.messageAlert = null
            // } catch (error) {
                
            // }
        }
    },
}
</script>