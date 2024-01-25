<template>
    <input 
    @input="$emit('update:modelValue', $event.target.value)"
    class=" input input-bordered w-full" 
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