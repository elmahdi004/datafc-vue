<template lang="">
    <button v-if="renderTrigger"
        className="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"
    >
        <div
            className="h-8 w-8 rounded-full object-cover bg-[#E1FDFF] text-primary flex justify-center items-center uppercase"
            alt="name"
        >
            {{  renderTrigger.name.slice(0, 2) }}
        </div>
    </button>
    <!-- <span className="inline-flex rounded-md">
                      <button type="button" className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-primary hover:text-primary/80 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-primary/80 active:bg-gray-50 dark:active:bg-primary/80 transition ease-in-out duration-150">
                        name
                        <svg className="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                      </button>
                    </span> -->
</template>
<script setup>
import { defineProps, onMounted, ref } from "vue";
import { useStore } from "vuex";
const store = useStore();
const props = defineProps(["renderTrigger"]);
</script>
<style lang=""></style>
