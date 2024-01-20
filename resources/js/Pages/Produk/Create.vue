<template>
        <Head title="Produk" />
        <AuthenticatedLayout>

            <div class="w-full px-6 xl:px-28 p-4 rounded">

                <div class="container py-2 space-y-2">
                    <p class="text-lg">Product Initial</p>
                    <Link 
                    class="text-sm text-custom-red inline-flex"
                    :href="route('product.index')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z"/></svg>
                        <span>Kembali ke produk</span>
                    </Link>
                </div>
                <hr>
                <div class="grid grid-flow-rows grid-cols-3 gap-16 my-4">
                <!-- Create product Container -->
                    <div class="grid grid-cols-1 col-span-2 gap-4">
                        <div class="w-fit justify-self-end">
                            <PrimaryButton @click="postProductHandler" class="float-right inline-flex space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/></svg>
                                <span>Simpan</span>
                            </PrimaryButton>
                        </div>
                        <Alert
                        :status=statusAlert
                        >
                            <template #message >
                               <div v-html="statusMessage"></div>
                            </template>
                        </Alert>
                        <div class="input-group grid grid-cols-1 gap-2">
                           <LabelCustom>
                            Nama Produk
                           </LabelCustom>
                            <TextInputField 
                            type="text"
                            v-model="namaProduk.value"
                            class="bg-transparent"
                            placeholder="nama produk"
                            ></TextInputField>
                            <label class="text-custom-red" for="" v-if="namaProduk.message">{{ namaProduk.message }}!</label>
                        </div>
                        <div class="input-group grid grid-cols-1 gap-2">
                           <LabelCustom>
                            Nomor Registrasi
                           </LabelCustom>
                            <TextInputField 
                            type="text"
                            v-model="reg.value"
                            class="bg-transparent"
                            placeholder="Reg. number"
                            ></TextInputField>
                            <label class="text-custom-red" for="" v-if="namaProduk.message">{{ reg.message }}!</label>
                        </div>
                        <div class="input-group grid grid-cols-1 gap-2">
                           <LabelCustom>
                            Harga Beli
                           </LabelCustom>
                           <div class="inline-flex">
                            <div class="px-4 flex flex-row justify-center items-center">
                             <span>Rp.</span>
                           </div>
                            <TextInputField 
                            type="number"
                            v-model="harga_beli"
                            class="bg-transparent"
                            placeholder="harga beli produk"
                            ></TextInputField>
                           </div>
                        </div>
                        <div class="input-group grid grid-cols-1 gap-2">
                           <LabelCustom>
                            Harga Jual
                           </LabelCustom>
                           <div class="inline-flex">
                            <div class="px-4 flex flex-row justify-center items-center">
                             <span>Rp.</span>
                           </div>
                            <TextInputField 
                            type="number"
                            v-model="harga_jual"
                            class="bg-transparent"
                            placeholder="harga jual produk"
                            ></TextInputField>
                           </div>
                        </div>
                        <div class="input-group grid grid-cols-1 gap-2">
                            <LabelCustom>
                            Keterangan
                            <small>*opsional</small>
                           </LabelCustom>
                           <Textarea @input="(value) => keterangan = value.target.value" class="bg-transparent overflow-hidden border rounded" />
                        </div>

                        <div class="image-container">
                            <input
                            class="block w-full text-sm text-custom-red
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-rose-200 file:text-custom-red
                            hover:file:bg-rose-300" 
                            type="file" 
                            ref="inputFile"
                            @change="attachImageHandler"
                            multiple>
                        </div>
                        <div class="image-preview-container grid grid-flow-row grid-cols-3 gap-4">
                            <div class="rounded bg-white overflow-hidden flex flex-col items-center 
                            space-y-2 p-2 justify-between shadow" v-for="(item,index) in image" :key="item.id">
                                <img class=" w-full h-full" :src="item.path" alt="" srcset="">
                                <button 
                                @click="()=>{
                                    image.splice(index,1)
                                    
                                }"
                                class=" text-custom-red bg-rose-100 w-fit h-fit px-2 rounded">
                                    hapus
                                </button>
                            </div>
                        </div>
                    </div>
                <!-- end Create product Container -->


                <!-- Label Container -->
                    <div class="grid grid-cols-1 gap-2 h-fit">
                        <LabelCustom class="w-fit h-fit">
                            Label Produk
                        </LabelCustom>

                        <div class=" label-selected">
                           <v-select
                           class="bg-transparent border rounded dark:border-custom-red"
                           v-model="label"
                           multiple
                           :options="optionLabel"></v-select>
                        </div>

                        <div class="container create-label-container space-y-2 border-t pt-2 mt-4">
                            <div class="w-fit h-fit">
                                <button @click="()=>{isCreateLabel = !isCreateLabel}" class="text-sm border
                                     border-gray-300 text-custom-red rounded px-2 py-1 inline-flex space-x-1
                                      duration-200 delay-100 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M11 13v3q0 .425.288.713T12 17q.425 0 .713-.288T13 16v-3h3q.425 0 .713-.288T17 12q0-.425-.288-.712T16 11h-3V8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8v3H8q-.425 0-.712.288T7 12q0 .425.288.713T8 13zm1 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/>
                                    </svg>
                                    <span>{{ !isCreateLabel ? 'Buat label':'Batal' }}</span>
                                </button>
                            </div>

                            <div class="container space-y-2 h-fit w-full transition-transform duration-100 delay-75 ease-in-out"
                            :class="{
                                'h-fit':isCreateLabel,
                                'h-0 overflow-hidden':!isCreateLabel
                            }">
                                <TextInputField 
                                class="bg-transparent border-custom-blue-500"
                                placeholder="nama label"
                                v-model="labelPost"
                                ></TextInputField>
                                <PrimaryButton 
                                @click="createLabelHandler"
                                class="float-right">Simpan</PrimaryButton>
                            </div>
                        </div>
                    </div>
                <!-- end Label Container -->

                </div>
               
            </div>
        </AuthenticatedLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInputField from '@/Components/TextInputField.vue';
import LabelCustom from '@/Components/LabelCustom.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Alert from '@/Components/Alert.vue'


import axios from 'axios'
export default {
    components:{
    Head, AuthenticatedLayout,
    TextInputField, LabelCustom,
    LabelCustom,
    Link,PrimaryButton,Alert
},
    data() {
        return {
            namaProduk:{
                value:null,
                message:null
            },
            reg:{
                value:null,
                message:null
            },
            image:[],
            harga_beli:0,
            harga_jual:0,
            label:null,
            labelPost:null,
            keterangan:null,
            optionLabel:[],
            isCreateLabel:false,
            statusAlert:null,
            statusMessage:null
        }
    },
    async mounted() {
        this.optionLabel = await this.fetchLabelData();
    },
    methods: {
        async fetchLabelData(){
            const data = await axios.get(route('produk_label.findAllData'))
            .then((result) => {
                return result.data;
            }).catch((err) => {
                
            });

            return data.map((item) => {
                return item.nama
            })
        },
        async createLabelHandler(){
            await axios.post(route('produk_label.create'),{
                nama:this.labelPost
            })
            .then((result) => {
                this.optionLabel.push(this.labelPost);
                this.isCreateLabel = false
            }).catch((err) => {
                
            });
        },
        async postProductHandler(){


            var data = new FormData();
            if(this.namaProduk.value != null) data.append('nama',this.namaProduk.value);
            if(this.namaProduk.value != null) data.append('reg',this.reg.value);
            if(this.keterangan != null) data.append('keterangan',this.keterangan);
            if(this.label != null) data.append('label',this.label);
            if(this.harga_beli) data.append('harga_beli',this.harga_beli);
            if(this.harga_beli) data.append('harga_beli',this.harga_beli);

            this.image.forEach(element => {
                data.append('image_path[]',element.file)
            });

            const response = await axios.post(route('product.insert'),data,{
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((result) => {
                this.statusMessage = `<div class="flex flex-row justify-between items-center">
                    <span>berhasil menambah produk</span> <a class="bg-emerald-700  text-white px-2 py-1 rounded " href="${route('product.index')}">Kembali ke halaman produk</a>
                    </div>`;
                this.statusAlert = 'success'

            }).catch((err) => {
                this.statusMessage = err.response.data.message;
                this.statusAlert = 'error'

                const error = err.response.data.errors;
                for (let i = 0; i < Object.keys(error).length; i++) {
                    const key = Object.keys(error)[i];
                    switch (key) {
                        case 'nama':
                                this.namaProduk.message = error[key][0]
                            break;
                        case 'reg':
                                this.reg.message = error[key][0]
                            break;
                    }
                    
                }
            });
        },
        attachImageHandler(){
            this.image.push({
                file:this.$refs.inputFile.files[0],
                path:URL.createObjectURL(this.$refs.inputFile.files[0])
            });
        }
    },
}
</script>

<style scoped>
</style>