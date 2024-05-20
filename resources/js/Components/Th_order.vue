<template lang="">
        <th
            scope="col"
            className="px-6 text-center py-3 cursor-pointer
             dark:border-gray-300 text-black">{{name_la}}
        </th>
</template>
<script setup>
import {defineProps} from 'vue';
const props = defineProps(['name_la']);
</script>
<style lang="">
    
</style>