<template>
    <select
    :value="value"
    @change="(item)=> {$emit('update:value', item.target.value)}"
    class=" select select-bordered w-full max-w-xs" id="">
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