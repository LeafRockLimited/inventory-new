<template>
        <div class="p-4 bg-white card shadow-lg flex flex-row items-center space-x-2" :class="spanWidth">
            <slot name="body"></slot>
        </div>
</template>

<script>
export default {
    props:{
        width:{
            type:Number,
            default:1
        }
    }, 
    computed: {
        spanWidth(){
            return 'col-span-'+this.width
        }
    },
    mounted() {
        
    },
}
</script>