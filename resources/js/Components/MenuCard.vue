<template>
    <div class="card relative w-40 lg:w-full shadow-xl overflow-hidden p-4 min-h-40" :class="bgColor">
        <div class="absolute z-0 -right-12 -bottom-12 w-48 rotate-12">
            <slot name="icon"></slot>
        </div>
        
        <div class="z-10 h-full flex flex-col justify-between">

            <div class="relative lg:text-2xl text-white">
                <slot name="title"></slot>
            </div>

            <div class="btn btn-primary w-fit">
                <slot name="link"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        bgColor : String
    },
    mounted() {
        console.log(this.bgColor);
    },
}
</script>