<template>
    <button
        class="inline-flex items-center px-4 py-2 
        bg-gray-800 dark:bg-custom-blue-500 border border-transparent 
        rounded-md font-semibold text-xs 
        text-white uppercase tracking-widest
        dark:hover:bg-custom-blue-600 hover:bg-gray-700 focus:bg-custom-blue-600
        active:bg-gray-900 focus:outline-none focus:ring-2 
        focus:ring-indigo-500 focus:ring-offset-2
         transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
