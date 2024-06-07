<template lang="">
    <section className="bg-white py-32">
        <h3
            className="sm:text-3xl sm:leading-tight text-center pt-5 md:text-4xl md:leading-tight dark:text-white"
        >
            Nos Clients
        </h3>
        <div className="container flex h-[30vh] justify-center items-center">
            <div className="flex flex-wrap -mx-2">
                <div className="w-full px-4" v-if="nosClients.length > 0">
                    <div className="flex flex-wrap items-center justify-center">
                        <a  v-for="(item, index) in nosClients" :key="index"
                            :href="item.website"
                            className="mx-4 flex w-[80px] items-center justify-center  2xl:w-[160px]  ease-in-out delay-150 duration-700 transition-opacity	 opacity-70  hover:opacity-100"
                        >
                            <img :src="`/storage/${item.href}`" :alt="item.Alt"
                            className="w-full " />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import api from "@/axios";
import { onMounted, ref } from "vue";

const nosClients = ref([]);
onMounted(()=>{
    api.get('/nosclients').then(({data})=>nosClients.value = data).catch((e)=>console.log(e));
});
</script>
<style lang=""></style>
