<template>
    <div class="grid grid-cols-1 gap-4">
        <div class="flex flex-row justify-between">
            <div>
               <SelectOption @update:value="(item) =>{length = parseInt(item)}" :value="length??10" :data="[10,25,50,75,100]"></SelectOption>
            </div>
            <div>
                <TextInputField
                    v-model="searchVal"
                    placeholder="search"
                >
                </TextInputField>
            </div>
        </div>
        <div>
            <table class="w-full dark:text-white">
                <thead>
                    <th class="border-b" v-for="(item, index) in columns" :key="index">
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
                    <td class="py-2 border-b pl-2" v-for="(itemCol, indexCol) in item" :key="indexCol">
                            <div v-html="itemCol.item" @click="handleFunctionEvent(itemCol.function)"></div>
                        </td>
                    </tr>
                    <template v-else>
                        <tr>
                            <td>No data</td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <div class="grid mt-4 dark:text-white">
                <div>
                    Total data {{ totalData }}
                </div>    
            </div>
        </div>
    </div>
</template>

<script>
import TextInputField from '@/Components/TextInputField.vue';
import SelectOption from './SelectOption.vue';
export default {
    props:{
        columns:Array,
        data:Array,
        deleteHandler: Function,
        totalData: Number,
        length:Number,
        search:String
    },
    components:{
        TextInputField,
        SelectOption
    },
    data() {
        return {
            searchVal:''
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