<template>
    <div 
    v-if="status!=null"
    class="p-2 rounded"
    :class="{
        'bg-emerald-200 border border-emerald-500 text-emerald-800' : status == 'success',
        'bg-rose-200 border border-rose-500 text-rose-800' : status == 'error'
    }">
        <slot name="message"></slot>
        
    </div>
</template>

<script>
export default {
    props:{
        status:String,
    },
    
}
</script>