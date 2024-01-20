<template>
    <select
    :value="value"
    @change="(item)=> {$emit('update:value', item.target.value)}"
    class=" max-h-10 rounded border dark:border-custom-red dark:bg-transparent dark:text-white border-neutral-500" id="">
        <option v-for="(item, index) in data" :key="index" :value="item">{{ item }}</option>
    </select>
</template>
<script>
export default {
    props:{
        data:Array,
        value:Number
    }
}
</script>