<template lang="">
        <div>
            <section class="relative overflow-hidden">
                <div class="w-full flex items-center h-[50vh] opacity-90 bg-cover bg-fixed bg-hero-info-formation"
                style="
                    background-image: url('/images/hero-info-formation-Management.jpg')"
                >
                    <div class=" absolute  backdrop-grayscale w-full h-full   ">
                    </div>
                    <figure class="mx-auto max-w-4xl ">
                        <blockquote class="relative font-display text-3xl font-medium tracking-tight  sm:text-4xl">
                            <h1 class="mb-4 text-3xl font-bold drop-shadow-lg leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white">
                                {{title}}
                            </h1>
                        </blockquote>
                        <figcaption class="mt-10">
                        </figcaption>
                    </figure>
                </div>
            </section>
        </div>
</template>
<script setup>
import { defineProps } from 'vue';
const props = defineProps(['title'])
</script>
<style lang="">
    
</style>