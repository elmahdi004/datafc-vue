<template lang="">
            <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                <div class="w-full mb-10">
                    <h4 class="text-lg font-semibold mb-9 text-dark"> {{header}} </h4>
                    <ul style="list-style: none;">{{children}}</ul>
                </div>
            </div>
</template>
<script setup>
import { DefineProps } from 'vue';
const props = defineProps(["header","children"]);
</script>
<style lang="">
    
</style>