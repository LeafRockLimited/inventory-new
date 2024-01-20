<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="w-full flex flex-row ">
            <div class="user-sidebar w-full px-6 xl:px-28" >
                <p class="text-2xl font-medium">Manajemen user</p>
                <p>Atur akses untuk seluruh halaman web anda, gunakan beberapa fungsi termasuk pengaturan jenis akun</p>

                <div class="user-table border p-4 rounded bg-white my-4">
                   <TableVue 
                    :columns="columns" 
                    :data="data"
                    :length="lengthData"
                    :search="search"
                    @update:length="(item) => {lengthData = item}"
                    @update:search="(item) => {search = item}" 
                   >
                   </TableVue>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import TableVue from '@/Components/Table.vue'
import TableBody from '@/Models/TableBody';
import axios from 'axios';

export default {
    components:{
        AuthenticatedLayout,
        Head,
        Link,
        TableVue
    },
    data() {
        return {
            columns:['No.','Nama','Role','email',''],
            data:[],
            tableData : new TableBody,
            lengthData : 10,
            search:''
        }
    },
    computed: {

    },
    mounted() {
        this.fetchData()
    },
    watch: {
        lengthData(newValue){
            this.fetchData()
        },
        search(newVal){
            this.fetchData()
        }
    },
    methods: {
        async fetchData(){
            let response = await axios.get(route("user.show"),{
                params:{
                    length:this.lengthData,
                    search:this.search
                }
            })
            .then((result) => {
                return result.data
            });
            this.tableData.total_data = response.total;
            this.tableData.link = response.link;
            this.tableData.current_page = response.current_page

            this.data = response.data.map((item, index) => {
                return [
                    {
                        item:this.tableData.rowNum(index),
                    },
                    {
                        item:item.name,
                    },
                    {
                        item:`
                            <div>
                                <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                ${item.role?.desc}
                                </button>
                                <Modal :show="showModal" @update:show="showModal = $event">
                                <p class="text-gray-700">This is a modal!</p>
                                <button @click="closeModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">
                                    Close Modal
                                </button>
                                </Modal>
                            </div>
                        
                        `,
                    },
                    {
                        item:item.email,
                    },
                    {
                        item:'delete',
                        function:()=>this.deleteHandler(item.id)
                    },
                ]
            });
        },
        async deleteHandler(id){
            let response = await axios.delete(route('user.delete',id))
            .then((result) => {
                console.log(result.data)
            }).catch((err) => {
                console.log(err.message)
            });
            this.fetchData()
        }
    },
}
</script>