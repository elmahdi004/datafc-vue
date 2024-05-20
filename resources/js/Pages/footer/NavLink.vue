<template lang="">
<div>
            <li style="list-style: none;">
                <a
                    :href="link"
                    class="inline-block mb-2 text-base leading-loose text-body-color hover:text-primary"
                >
                    {{label}}
                </a>
            </li>
        </div>
</template>
<script setup>
const props = defineProps(["link","label"]);
</script>
<style lang="">
    
</style>