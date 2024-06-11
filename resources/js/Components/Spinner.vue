<template lang="">
    <div class="flex items-center justify-center bg-transparent">
        <div
            :class="['spinner border-2 border-solid rounded-full animate-spin',width,height,color]"
        ></div>
    </div>
</template>
<script setup>
import {defineProps} from 'vue';
const props = defineProps([
    'width',
    'height',
    'color'
]);
</script>
<style scoped>
.spinner {
    /* border-top-color: white; */
    border-right-color: transparent;
    border-bottom-color: transparent;
    /* border-left-color: white; */
}
</style>
