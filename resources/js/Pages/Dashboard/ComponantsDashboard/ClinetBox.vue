<template lang="">
    <li class='select-none' @click="setAsActiveMsg">
        <input type="radio" :id="'hosting-'+message.id" class="peer hidden" />
        <label :for="'hosting-'+message.id" 
               :class="{
                   'group block h-full cursor-pointer px-3 py-3 transition border-b border-gray-500/20': true,
                   'bg-primary text-white': activeMsgId === message.id,
                   'bg-white': activeMsgId !== message.id
               }"
               class="hover:bg-primary/80 hover:text-white">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-[#E1FDFF] flex items-center justify-center text-lg text-black shadow">
                    {{ message.full_name.slice(0,2) }}
                </div>
                <div class="p-2">
                    <span class="flex justify-between items-center">
                        <h3 class="text-sm font-semibold">{{ message.full_name }}</h3>
                    </span>
                    <p class="text-sm opacity-60 drop-shadow">{{ message.object }}</p>
                    <p class="text-sm opacity-60 drop-shadow">{{ message.created_at }}</p>
                </div>
            </div>
        </label>
    </li>
    </template>
<script setup>
import {defineProps,defineEmits, onMounted} from 'vue';
const props = defineProps(['message','activeMsgId']);
const emit = defineEmits(['set-as-active-msg']);
const setAsActiveMsg = ()=>{
emit('set-as-active-msg',props.message);
console.log('emit Done',props.message)
}
onMounted(()=>{
    console.log(props.message);
});
</script>
<style lang="">
    
</style>