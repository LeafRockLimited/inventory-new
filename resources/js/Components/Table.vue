<template>
    <div class="grid grid-cols-1 gap-4">
        <div class="flex flex-row justify-between">
            <div>
               <SelectOption @update:value="(item) => {length = parseInt(item)}" :value="length??10" :data="[10,25,50,75,100]"></SelectOption>
            </div>
            <div>
                <TextInputField
                    v-model="searchVal"
                    placeholder="search"
                >
                </TextInputField>
            </div>
        </div>
        <div class="rounded-lg overflow-hidden">
            <table class="border-neutral-50 table-fixed flex-nowrap p-3 w-full dark:text-white">
                <thead class="bg-custom-red static">
                    <th @click="() => {
                        dir == 'asc' ? dir = 'desc' : dir = 'asc';
                        this.$emit('update:colSort',{col:index + 1,dir: dir});
                    }" class="w-fit border-b py-2.5 text-white" v-for="(item, index) in columns" :key="index">
                        <div class="inline-flex">
                            <span>{{ item }} </span>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 32 32"><path fill="currentColor" d="m16 28l-7-7l1.41-1.41L16 25.17l5.59-5.58L23 21zm0-24l7 7l-1.41 1.41L16 6.83l-5.59 5.58L9 11z"/></svg>
                            </button>
                        </div>
                    </th>
                </thead>
                <tbody>
                    <tr v-if="data.length > 0" v-for="(item, index) in data" :key="index">
                         <td class="py-2 border-b pl-5" v-for="(itemCol, indexCol) in item" :key="indexCol">
                            <div v-if="itemCol.function" v-html="itemCol.item" @click="handleFunctionEvent(itemCol.function)"></div>
                            <div v-else v-html="itemCol.item"></div>
                        </td>
                    </tr>
                    <template v-else>
                        <tr>
                            <td>No data</td>
                        </tr>
                    </template>
                </tbody>
            </table>
           
           <div class="flex flex-rows justify-between items-center">
                <div class="grid mt-4 dark:text-white">
                    <div>
                        Total data {{ totalData }}
                    </div>    
                </div>
                <div class="links-container inline-flex">
                    <div v-for="(item, index) in links" :key="index">
                        <button class="px-3 py-1"
                        :class="{
                            'bg-custom-red shadow text-white' : item.active,
                            ' bg-neutral-100  text-rose-600' : !item.active,
                        }" @click="() => {this.$emit('update:page',item.url)}" v-html="item.label"></button>
                    </div>
                </div>
           </div>
        </div>
    </div>
</template>

<script>
import TextInputField from '@/Components/TextInputField.vue';
import SelectOption from './SelectOption.vue';
import { debounce } from 'vue-debounce'
export default {
    directives: {
        debounce
    },
    props:{
        columns:Array,
        data:{
            type:Array,
            default:[{item:null, function:null}]
        },
        deleteHandler: Function,
        totalData: Number,
        length:Number,
        search:String,
        links:Array
    },
    components:{
        TextInputField,
        SelectOption
    },
    data() {
        return {
            searchVal:'',
            dir:'asc'
        }
    },
    watch: {
       length(newValue){
         this.$emit('update:length',newValue)
       },
       searchVal(newVal){
            if (newVal != '') {
                this.$emit('update:search',newVal)
            }else{
                this.$emit('update:search',null)
            }
       }
    },
    computed: {
       
    },
    methods: {
        handleFunctionEvent(onClick){
            onClick()
        }
    },
}
</script>