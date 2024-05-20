<template>
    <button
        :class="['inline-flex items-center px-4 py-2 bg-primary dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-primary uppercase tracking-widest hover:bg-primary/80 dark:hover:bg-white focus:bg-primary/80 dark:focus:bg-white active:bg-primary/95 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-chill-500 focus:ring-offset-2 dark:focus:ring-offset-primary transition ease-in-out duration-150',newClass]"
    >
        <slot />
    </button>
</template>
<script setup>
import { defineProps } from 'vue';
const props = defineProps(['newClass'])
</script>
