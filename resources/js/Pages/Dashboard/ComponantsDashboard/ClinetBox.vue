<template lang="">
<li class='select-none' @click="">
            <input type="radio" id="hosting-" class="peer hidden"  />
            <label htmlFor="hosting-" class="group  block h-full cursor-pointer bg-white px-3 py-3 transition border-b border-gray-500/20 peer-checked:bg-primary hover:bg-primary/80 hover:text-white peer-checked:text-white">
                <div class="flex  items-center">
                    <img src="" class="w-12 h-12 rounded-full bg-gray-300  flex items-center justify-center text-lg text-black shadow"/>


                    <div class="p-2">
                        <span class="flex  justify-between items-center">
                            <h3 class="text-sm font-semibold">{{message.full_name}}</h3>
                        </span>
                        <p class="text-sm opacity-60 drop-shadow">{{message.object}}</p>
                        <p class="text-sm opacity-60 drop-shadow">{{message.created_at}}</p>
                    </div>
                </div>
            </label>
        </li>
</template>
<script setup>
import {defineProps} from 'vue';
const props = defineProps(['message']);
</script>
<style lang="">
    
</style>