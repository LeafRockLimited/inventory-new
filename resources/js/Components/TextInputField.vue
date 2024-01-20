<template>
    <input 
    @input="$emit('update:modelValue', $event.target.value)"
    class=" max-h-10 rounded border border-neutral-500 dark:border-custom-red dark:bg-custom-black dark:text-white w-full" 
    :placeholder="placeholder"
    :value="modelValue">
</template>

<script>
export default {
    props:{
        placeholder:String,
        modelValue:String
    },
}
</script>